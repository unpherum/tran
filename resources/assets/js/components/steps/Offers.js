import React, {Component} from 'react';
import StepperMaster from './StepperMaster';
import ParcelStore from '../../stores/ParcelStore';
import ParcelActions from '../../actions/ParcelActions';
import Spinner from '../Spinner';

class Offers extends Component {
	constructor(props) {
		super(props);
		this.state = {
			shipment: this.props.shipment,
			providers: [
				{
					name: 'dpd',
					result: []
				}
			],
			offers: []
		};

		//Binding actions
		this._onChangeGetOffers = this._onChangeGetOffers.bind(this);
		this.chooseProvider = this.chooseProvider.bind(this);

		//Adding change listeners
        ParcelStore.addChangeListener(this._onChangeGetOffers);
	}
	componentDidMount(){
		let selected_country = this.state.shipment.to_country;
		let selected_zipcode = this.state.shipment.to_zipcode;
		let parcels = this.state.shipment.parcels;
		_.forEach(this.state.providers, function(value, key){
			ParcelActions.getOffer(value.name, selected_country, selected_zipcode, parcels);
		});
	}

    componentWillUnmount() {
        ParcelStore.removeChangeListener(this._onChangeGetOffers);
    }

    _onChangeGetOffers(){
        
        let offers = ParcelStore.getOffers();
        this.setState({
            offers: offers
        });

    }

    chooseProvider(offer){
    	let newShipment = this.props.shipment;
    	newShipment.offer = offer;

    	this.props.updateShipment(newShipment);

    	this.props.goNext();
    }

	onClickGoBack(){
		ParcelActions.cleanOffers();
		this.props.goBack();
	}

	render(){

		let vm = this;

		let parcels = vm.state.shipment.parcels.map((parcel, index) => {
			return <p className="small" key={index}>#{index+1} package of {parcel.weight}kg with {parcel.width}cm x {parcel.height}cm x {parcel.length}cm</p>
		});

		let spinner = null;
        if(vm.state.offers.length<=0){
            spinner = <Spinner />
        }

		let offers;
		if(vm.state.offers.length>0){
			offers = vm.state.offers.map((offer, index) => {

				return(
					<div key={index} className="col-12 col-md-4 px-2 mt-3">
						<div className="block-modal">
							<div className="block-modal-header p-3 text-center"><img className="logo" src={offer.logo_url} alt={offer.name} /></div>
							<div className="position-relative p-3 text-center">
								<span className="price h4 text-danger"> {offer.price} € VAT incl.</span>
								<p className="mt-3 p-3 bg-faded text-left">{offer.description}</p>
								<button onClick={()=>{vm.chooseProvider(offer)}} className="btn btn-raised btn-info btn-block mb-0">Choose {(offer.name).toUpperCase()}</button>
							</div>
						</div>	
					</div>
				);

			});
		}else{
			offers = <div className="alert alert-warning">There is no transporter available with the following options, go back to adjust the options or contact us for more information!</div>
		}

		return (
			<div className="step step-offers">
			    {spinner}
				<StepperMaster step={1}/>

			    <div className="pt-3 pb-4 text-center">
			        <i className="mdi mdi-calculator mdi-36px text-muted"></i>
			        <h1 className="h4 text-info text-uppercase">Envoi de colis</h1>
			    </div>

			    <div className="row px-2">
					<div className="col-12 col-md-6 px-2 mt-3">
						<p className="small">You will send {this.state.shipment.parcels.length} parcels</p>
						{parcels}
					</div>
					<div className="col-12 col-md-6 px-2 mt-3">
						<p className="small">
							Departure from {vm.state.shipment.from_zipcode} {vm.state.shipment.from_city} ({vm.state.shipment.from_country.name})<br />
							To {vm.state.shipment.to_zipcode} {vm.state.shipment.to_city} ({vm.state.shipment.to_country.name}) <br />
							Expected {vm.state.shipment.shipping_date}
						</p>
					</div>
				</div>

				<div className="row row-eq-height px-2 pricing">
					
					{offers}
					
					<div className="col-12 px-2 mt-5">
						<button className="btn btn-raised btn-info" onClick={vm.onClickGoBack.bind(this)}>Retour</button>
					</div>
				</div>

			    
			</div>
		);
	}
}
export default Offers;
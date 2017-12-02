import React, {Component} from 'react';
import StepperMaster from './StepperMaster'
import ParcelStore from '../../stores/ParcelStore';
import ParcelActions from '../../actions/ParcelActions';
import OrderConfirmation from '../OrderConfirmation';
import Spinner from '../Spinner';

class Confirmation extends Component {
	constructor(props) {
		super(props);
		this.state = {
			sendResult: []
		};

		//Bind actions
		this._onChangeSendParcels = this._onChangeSendParcels.bind(this);
		this.done = this.done.bind(this);

		//add listener
		ParcelStore.addChangeListener(this._onChangeSendParcels);
  	}
  	componentDidMount(){
  		this.props.sendParcels();
  	}

    componentWillUnmount() {
        ParcelStore.removeChangeListener(this._onChangeSendParcels);
    }

    _onChangeStopSpinner(){
    	this.setState({
    		loading: false
    	});
    }

  	_onChangeSendParcels(){

        let sendResult = ParcelStore.getSendResult();
        this.setState({
            sendResult: sendResult
        });

        console.log('');

  	}
  	done(){
  		window.location.reload();
  	}

  	dummy_data(){
		let data = {
			"users_id": 1,
			"parcels": [{
				"weight": "2",
				"width": "2",
				"length": "2",
				"height": "2",
				"value": "2",
				"content": "2"
			}],
			"from_zipcode": "78700",
			"from_city": "78700",
			"from_country": "France",
			"from_country_prefix": "FR",
			"to_zipcode": "78700",
			"to_city": "78700",
			"to_country": "France",
			"to_country_prefix": "FR",
			"price": "11.25",
			"transporter": "dpd",
			"first_name": "Pherum",
			"last_name": "Un",
			"telephone": "6785768768",
			"shippingdate": "12/12/2017",
			"email": "un.pherum@gmail.com",
			"from_company": "Personal",
			"from_address": "address of pherum",
			"to_company": "PFS",
			"to_address": "address of PFS "
		}

		return data;
	}

	sendDummyData(){
		let shipment = this.dummy_data();
		ParcelActions.sendParcels(shipment);

		/*this.setState({
  			sendResult: [
  				{
  					parcelnumber: 564654654,
  					barcode: 45586054986054964,
  					type: 'eprint'
  				},
  				{
  					parcelnumber: 564654654,
  					barcode: 45586054986054964,
  					type: 'eprint'
  				}
  			]
  		});*/
	}

	render(){

		let vm = this;
		let listParcel = null;
		if(vm.state.sendResult.length>0){
			console.log('about to prepare confirmation');
			listParcel = <OrderConfirmation setLoading={this.props.setLoading} parcels={vm.state.sendResult} />
		}else{
			listParcel = "There is no parcel here!";
		}

		return (
			<div className="step step-offers">

				<StepperMaster step={4} />

				<div className="pt-3 pb-4 text-center">
					<i className="mdi mdi-checkbox-marked-circle-outline mdi-24px text-muted"></i>
					<h1 className="h4 text-info text-uppercase">CONFIRMATION OF YOUR SHIPMENT</h1>
				</div>

				<div className="pt-3 pb-4 text-left">
					<h1 className="h4 text-info">You are shipping {vm.state.sendResult.length} parcel(s)</h1>
				</div>

				<div className="pt-3 pb-4 text-center">
					{listParcel}
				</div>

				<div className="col-12 px-2 mt-3 text-right">
					<button onClick={vm.done}className="btn btn-raised btn-block btn-info" >Done</button>
				</div>
				<div className="col-12 px-2 mt-3 text-left">
					{/*<button className="btn btn-raised btn-info" type="button" onClick={vm.sendDummyData.bind(this)}>Test Send Parcels</button>*/}
				</div>

				
			</div>
		)
	}
}

export default Confirmation;
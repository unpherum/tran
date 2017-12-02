import React, {Component} from 'react';
import ParcelStore from '../stores/ParcelStore';
import ParcelActions from '../actions/ParcelActions';
import Tabs from 'react-simpletabs';
import Stepper from 'react-stepper-horizontal';
import GeneralInfo from './steps/GeneralInfo';
import Offers from './steps/Offers';
import Address from './steps/Address';
import Payment from './steps/Payment';
import Confirmation from './steps/Confirmation';
import Spinner from './Spinner';

class FormSendParcel extends Component {
	
	constructor(props) {
		super(props);
		this.state = {
			step: 1,
			loading: true,
			shipment: {
				parcels: [],
				from_zipcode: '',
				from_city: '',
				from_country: '',
				to_zipcode: '',
				to_city: '',
				to_country: '',
				offer: ''
			}
		};

		//binds
		this.updateShipment = this._updateShipment.bind(this);
		this._goNext = this._goNext.bind(this);
		this._goBack = this._goBack.bind(this);
		this._sendParcel = this._sendParcel.bind(this);
		this._onBeforeChange = this._onBeforeChange.bind(this);
		this._onAfterChange = this._onAfterChange.bind(this);
		this._onMount = this._onMount.bind(this);
		this._setLoading = this._setLoading.bind(this);
		this._onChangeStopSpinner = this._onChangeStopSpinner.bind(this);

		ParcelStore.addSpinnerChangeListener(this._onChangeStopSpinner);
	
	}
	
	componentWillReceiveProps(newProps){
		 
	}
	componentWillUnmount(){
		ParcelStore.removeSpinnerChangeListener(this._onChangeStopSpinner);
	}
	componentDidMount(){
		
	}

	_onChangeStopSpinner(){
    	this.setState({
    		loading: false
    	});
    }

	_sendParcel(){
		this.setState({
			loading: true
		});
		let shipment = this.prepareDataToSend();
		ParcelActions.sendParcels(shipment);

	}

	_onBeforeChange(){

	}
	_onAfterChange(){

	}
	_onMount(){

	}

	_onChangeCountries(){
		this.setState({
			countries: ParcelStore._getCountries()
		});
	}

	_goNext(){
		if(this.state.step<5){
			let nextStep = this.state.step + 1;
			this.setState({
				step: nextStep
			});
		
		}
	}

	_goBack(){
		if(this.state.step>1){
			let previousStep = this.state.step - 1;
			this.setState({
				step: previousStep
			});
		}
	}

	_updateShipment(newShipment){
		this.setState({
			shipment: newShipment
		});
	}

	_getStep(){
		return this.state.step;
	}

	_setLoading(loading){
		this.setState({
			loading: loading
		});
	}

	prepareDataToSend(){
		let dataToSend = this.state.shipment;

		dataToSend.user_id = __user.id;

		let offer = this.state.shipment.offer;
		dataToSend.price  = offer.price;
		dataToSend.transporter  = offer.name;
		delete dataToSend.offer;

		let from_country = this.state.shipment.from_country;
		delete dataToSend.from_country;
		dataToSend.from_country  = from_country.name;
		dataToSend.from_country_prefix  = from_country.prefix;

		let to_country = this.state.shipment.to_country;
		delete dataToSend.to_country;
		dataToSend.to_country  = to_country.name;
		dataToSend.to_country_prefix  = to_country.prefix;

		return dataToSend;
	}

	render(){
	
		let vm = this;
		let step = vm._getStep();

		
		let spinner = null;
        if(vm.state.loading){
            spinner = <Spinner />
        }

		return (

			<div className='container bg-white'>
				{spinner}
				<div className='step-progress'>
				
					<Tabs tabActive={step} 
						onBeforeChange={this.onBeforeChange}
						onAfterChange={this.onAfterChange}
						onMount={this.onMount} >
						<Tabs.Panel title='Tab #1'>
							<GeneralInfo setLoading={vm._setLoading} updateShipment={vm.updateShipment} shipment={vm.state.shipment} goNext={vm._goNext} goBack={vm._goBack} />
						</Tabs.Panel>
						<Tabs.Panel title='Tab #2'>
							<Offers setLoading={vm._setLoading} updateShipment={vm.updateShipment} shipment={vm.state.shipment} goNext={vm._goNext} goBack={vm._goBack} />
						</Tabs.Panel>
						<Tabs.Panel title='Tab #3'>
							<Address setLoading={vm._setLoading} updateShipment={vm.updateShipment} shipment={vm.state.shipment} goNext={vm._goNext} goBack={vm._goBack} />
						</Tabs.Panel>
						<Tabs.Panel title='Tab #4'>
							<Payment setLoading={vm._setLoading} updateShipment={vm.updateShipment} shipment={vm.state.shipment} goNext={vm._goNext} goBack={vm._goBack} />
						</Tabs.Panel>
						<Tabs.Panel title='Tab #5'>
							<Confirmation setLoading={vm._setLoading} sendParcels={vm._sendParcel} />
						</Tabs.Panel>
					</Tabs>   
					
				</div>
				
			</div>
		);
	}
}

export default FormSendParcel;
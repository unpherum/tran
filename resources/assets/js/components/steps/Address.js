import React, {Component} from 'react';
import StepperMaster from './StepperMaster';
import Input from 'muicss/lib/react/input';
import Button from 'muicss/lib/react/button';
import Option from 'muicss/lib/react/option';
import Select from 'muicss/lib/react/select';
import ParcelActions from '../../actions/ParcelActions';

class Address extends Component {

	constructor(props) {
		super(props);
		this.state = {
			shipment: this.props.shipment
		};

		//Binding actions
		this.onClickTriggerForm = this.onClickTriggerForm.bind(this);
		this.onClickGoBack = this.onClickGoBack.bind(this);
		this.handleChange = this.handleChange.bind(this);
		this.onAddressesFormSubmit = this.onAddressesFormSubmit.bind(this);
	}

	onClickTriggerForm(){
        $('#addressesFormButton').trigger('click');
    }

    onAddressesFormSubmit(e){

        e.preventDefault();
        
        let newShipment= this.state.shipment;

        newShipment.first_name = this.state.first_name;
        newShipment.last_name = this.state.last_name;
        newShipment.telephone = this.state.telephone;
        newShipment.email = this.state.email;

        newShipment.from_company = this.state.from_company;
        newShipment.from_address = this.state.from_address;
        newShipment.from_address2 = this.state.from_address2;

        newShipment.to_company = this.state.to_company;
        newShipment.to_address = this.state.to_address;
        newShipment.to_address2 = this.state.to_address2;

        this.props.updateShipment(newShipment);
        this.props.goNext();
        
    }

	componentDidMount(){

	}

	handleChange(e) {
        e.target.classList.add('active');
        this.setState({
          [e.target.name]: e.target.value
        });
        
    }

   	onClickGoBack(){

   		ParcelActions.cleanOffers();
		this.props.goBack();

	}



	render(){

		let vm = this;

		return (

			<div className="step step-offers">

				<StepperMaster step={2} />

				<div className="pt-3 pb-4 text-center">
					<i className="mdi mdi-credit-card mdi-36px text-muted"></i>
					<h1 className="h4 text-info text-uppercase">Addresses</h1>
				</div>
				
				<form onSubmit={vm.onAddressesFormSubmit} id="addressesForm">
				
					<div className="row px-2">

						<div className="col-12 col-lg-4 px-2 mt-3">
							<div className="block-modal">
								<div className="block-modal-header p-3"><h3 className="h6 mb-0 text-uppercase">Expéditeur</h3></div>
								<div className="p-3">
									<fieldset className="form-group mb-2">
										<Select name="from_country" label="Country" defaultValue={vm.state.shipment.from_country.prefix} disabled={true}>
	                                    	<Option value={vm.state.shipment.from_country.prefix} label={vm.state.shipment.from_country.name} />
	                                    </Select>
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="from_company" label="Company" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="from_address" label="Address" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="from_address2" label="Complément d'adresse" floatingLabel={true} required={false} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="from_zipcode" label="Zipcode" value={vm.state.shipment.from_zipcode} floatingLabel={true} disabled={true} onChange={vm.handleChange}/>
									</fieldset>
									<fieldset className="form-group mb-0">									
										<Input type="text" name="from_city" label="City" value={vm.state.shipment.from_city} floatingLabel={true} disabled={true} onChange={vm.handleChange}/>
									</fieldset>
								</div>
							</div>
						</div>
						<div className="col-12 col-lg-4 px-2 mt-3">
							<div className="block-modal">
								<div className="block-modal-header p-3"><h3 className="h6 mb-0 text-uppercase">Destinataire</h3></div>
								<div className="p-3">
									<fieldset className="form-group mb-2">
										<Select name="to_country" label="Country" defaultValue={vm.state.shipment.to_country.prefix} disabled={true}>
	                                    	<Option value={vm.state.shipment.to_country.prefix} label={vm.state.shipment.to_country.name} />
	                                    </Select>
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="to_company" label="Company" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="to_address" label="Address" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="to_address2" label="Complément d'adresse" floatingLabel={true} required={false} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="to_zipcode" label="Zipcode" value={vm.state.shipment.to_zipcode} floatingLabel={true} disabled={true} onChange={vm.handleChange}/>
									</fieldset>
									<fieldset className="form-group mb-0">
										<Input type="text" name="to_city" label="City" value={vm.state.shipment.to_city} floatingLabel={true} disabled={true} onChange={vm.handleChange}/>
									</fieldset>
								</div>
							</div>
						</div>
						<div className="col-12 col-lg-4 px-2 mt-3">
							<div className="block-modal">
								<div className="block-modal-header p-3"><h3 className="h6 mb-0 text-uppercase">Contact</h3></div>
								<div className="p-3">
									<fieldset className="form-group mb-2">									
										<Input type="text" name="first_name" label="First Name" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-2">
										<Input type="text" name="last_name" label="Last Name" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-0">
										<Input type="text" name="telephone" label="telephone" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
									<fieldset className="form-group mb-0">
										<Input type="email" name="email" label="Email" floatingLabel={true} required={true} onChange={vm.handleChange} />
									</fieldset>
								</div>
							</div>
						</div>

						<div>
                            <button type="submit" id="addressesFormButton" className="hidden"></button>
                        </div>


						<div className="col-6 px-2 mt-3">
							<button className="btn btn-raised btn-info" onClick={vm.onClickGoBack}>Back</button>
						</div>
						<div className="col-6 px-2 mt-3 text-right">
							<button className="btn btn-raised btn-info" onClick={vm.onClickTriggerForm}>Continue</button>
						</div>

					</div>

				</form>

			</div>
		);
	}
}

export default Address;
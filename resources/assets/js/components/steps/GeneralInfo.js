import React, {Component} from 'react';
import StepperMaster from './StepperMaster';
import ParcelTableRow from '../ParcelTableRow';
import ParcelStore from '../../stores/ParcelStore';
import ParcelActions from '../../actions/ParcelActions';
import Input from 'muicss/lib/react/input';
import Button from 'muicss/lib/react/button';
import Option from 'muicss/lib/react/option';
import Select from 'muicss/lib/react/select';
import NotificationSystem from 'react-notification-system';
import DatePicker from 'react-datepicker';
import Spinner from '../Spinner';
import moment from 'moment';

import 'react-datepicker/dist/react-datepicker.css';

class GeneralInfo extends Component {
    
    constructor(props) {
        super(props);
        this.state = {
            countries: [],
            from_zipcode: '',
            from_city: '',
            from_country: {"id":10,"name":"France Métropolitaine","prefix":"FR"},

            to_zipcode: '',
            to_city: '',
            to_country: {"id":10,"name":"France","prefix":"FR"},

            parcels: [],
            selected_date: moment().add(1, "days"),
            shippingdate: '',
            shipment: this.props.shipment

        };

        this._notificationSystem = null;

        //Binding 
        this.updateParcels = this.updateParcels.bind(this);
        this.onClickTriggerForm = this.onClickTriggerForm.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.handleSelectChange = this.handleSelectChange.bind(this);
        this._onChangeGetCountries = this._onChangeGetCountries.bind(this);
        this.onGeneralFormSubmit = this.onGeneralFormSubmit.bind(this);
        this.handleDateChange = this.handleDateChange.bind(this);

        //Adding change listeners
        ParcelStore.addChangeListener(this._onChangeGetCountries);
    }

    getMinDate(){
        return moment().add(1, "days");
    }

    getMaxDate(){
        return moment().add(10, "days");
    }

    componentDidMount(){
        this.props.setLoading(true);
        ParcelActions.getCountries();
        this.setState({
            shippingdate: this.state.selected_date.format("DD/MM/YYYY")
        });
    }

    _addNotification(event) {
        event.preventDefault();
        if (this._notificationSystem) {
            this._notificationSystem.addNotification({
                message: 'Parcel is empty! Please add at least one.',
                level: 'error'
            });
        }
    }

    componentWillUnmount() {
        ParcelStore.removeChangeListener(this._onChangeGetCountries);
    }

    _onChangeGetCountries(){
        
        let countries = ParcelStore.getCountries();
        this.setState({
            countries: countries
        });

    }

    updateParcels(parcels){
        this.setState({
          parcels: parcels
        });

    }

    handleChange(e) {
        this.setState({
          [e.target.name]: e.target.value
        });
        
    }

    handleDateChange(date){
        this.setState({
          selected_date: date,
          shippingdate: moment(date.toDate()).format("DD/MM/YYYY")
        });
    }

    handleSelectChange(e){
        e.target.classList.add('active');
        let selectedPrefix = e.target.selectedOptions[0].value;
        let value = _.find(this.state.countries, function(o){ 
            return o.prefix === selectedPrefix ;
        });
        this.setState({
          [e.target.name]: value
        });
    }

    onClickTriggerForm(){
        $('#generalFormButton').trigger('click');
    }

    onGeneralFormSubmit(e){

        e.preventDefault();

        if(this.state.parcels.length<=0 || !e.target.reportValidity()){
            this._addNotification(e);
        }else{
            let newShipment={};
            newShipment.parcels = this.state.parcels;
            newShipment.shippingdate = this.state.shippingdate;

            newShipment.from_zipcode = this.state.from_zipcode;
            newShipment.from_city = this.state.from_city;
            newShipment.from_country = this.state.from_country;

            newShipment.to_zipcode = this.state.to_zipcode;
            newShipment.to_city = this.state.to_city;
            newShipment.to_country = this.state.to_country;

            this.props.updateShipment(newShipment);
            this.props.goNext();    
        }
        
    }

    render(){

        let vm = this;

        let countryOptions = vm.state.countries.map((country, index) => {
            return <Option key={index} value={country.prefix} label={country.name} />
        });

        return (
            <div className="step step-general-info">
                    <StepperMaster step={0}/>
                    
                    <div className="pt-3 pb-4 text-center">
                        <i className="mdi mdi-package-variant mdi-36px text-muted"></i>
                        <h1 className="h4 text-info text-uppercase">Envoi de colis</h1>
                    </div>

                    <form onSubmit={vm.onGeneralFormSubmit} id="generalForm">
                        <div className="row row-eq-height px-2">
                            <div className="col-12 col-lg-4 px-2 mt-3">
                                <div className="block-modal">
                                    <div className="block-modal-header p-3">
                                        <h3 className="h6 mb-0 text-uppercase">Expéditeur</h3>
                                    </div>
                                    <div className="p-3">
                                        <fieldset className="form-group mb-2">
                                            <Select name="from_country" label="Country" value={vm.state.from_country.prefix}>
                                                <Option value="FR" label="France Métropolitaine" />
                                            </Select>
                                        </fieldset>
                                        <fieldset className="form-group mb-2">
                                            <Input type="number" name="from_zipcode" label="Zipcode" value={vm.state.from_zipcode}  min="0" max="99999" step="1" floatingLabel={true} required={true} onChange={vm.handleChange} />
                                        </fieldset>
                                        <fieldset className="form-group mb-0">
                                            <Input type="text" name="from_city" label="City"   floatingLabel={true} required={true} onChange={vm.handleChange} />
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div className="col-12 col-lg-4 px-2 mt-3">
                                <div className="block-modal">
                                    <div className="block-modal-header p-3">
                                        <h3 className="h6 mb-0 text-uppercase">Destinataire</h3>
                                    </div>
                                    <div className="p-3">
                                        <fieldset className="form-group mb-2">
                                            <Select name="to_country" label="Country" value={vm.state.to_country.prefix} onChange={ this.handleSelectChange} required={true}>
                                                {countryOptions}
                                            </Select>
                                        </fieldset>
                                        <fieldset className="form-group mb-2">
                                            <Input type="number" name="to_zipcode" label="Zipcode" floatingLabel={true} required={true} onChange={vm.handleChange} />
                                        </fieldset>
                                        <fieldset className="form-group mb-0">
                                            <Input type="text" name="to_city" label="City" floatingLabel={true} required={true} onChange={vm.handleChange} />
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <div className="col-12 col-lg-4 px-2 mt-3">
                                <div className="block-modal">
                                    <div className="block-modal-header p-3">
                                        <h3 className="h6 mb-0 text-uppercase">DATE DE RAMASSAGE</h3>
                                    </div>
                                    <div className="p-3">
                                        <DatePicker
                                            inline
                                            selected={vm.state.selected_date}
                                            onChange={vm.handleDateChange}
                                            minDate={vm.getMinDate()}
                                            maxDate={vm.getMaxDate()}
                                        />
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div>
                            <button type="submit" id="generalFormButton" className="hidden"></button>
                        </div>
                    </form>

                    <hr className="hr-large" />
                    <NotificationSystem ref={n => this._notificationSystem = n} />
                    <ParcelTableRow updateParcels={vm.updateParcels} parcels={vm.state.parcels} />

                    <div className="px-2 mt-3 text-center">
                        <button className="btn btn-raised btn-info" type="button" onClick={vm.onClickTriggerForm}>Rechercher les offers</button>
                    </div>
                
            </div>
        );
    }
}
export default GeneralInfo;
import Dispatcher from '../dispatcher';
import ActionTypes from '../constants';
import server from '../constants/server';
import PopuateDPDPricing from '../utils/common';
import ASSETS from '../constants/providerAssets';

let get_provider_assets_url = '/transporters/providers/providerAssets.js';
let get_provider_url = '/transporters/pricing/';

let get_countries_url = '/api/boxtoshop/countries/';
let get_sent_shipment_url = '/api/boxtoshop/shipment/sent/';

let send_parcels_url = '/api/boxtoshop/shipment/transporter/';
let print_label_url = '/api/boxtoshop/printlabel/';

class ParcelActions {


    getSentShipments(){
        axios.get(server.SERVER_URL+':'+server.SERVER_PORT+get_sent_shipment_url+__user.id).then( (response) => {
            
            Dispatcher.dispatch({
                actionType: ActionTypes.GET_SENT_SHIPMENT,
                payload: response.data 
            });
            this.stopSpinning();
        }).catch( (error) => {
            this.stopSpinning();
        });
    }

    printLabel(parcel){
        axios.post(server.SERVER_URL+':'+server.SERVER_PORT+print_label_url, parcel).then( (response) => {
            
            Dispatcher.dispatch({
                actionType: ActionTypes.PRINT_LABEL,
                payload: response.data.data 
            });
            this.stopSpinning();
        }).catch( (error) => {
            this.stopSpinning();
        });
    }
 
    sendParcels(shipment) {
        
        axios.post(server.SERVER_URL+':'+server.SERVER_PORT+send_parcels_url, shipment).then( (response) => {
            Dispatcher.dispatch({
                actionType: ActionTypes.SEND_PARCEL,
                payload: response.data.data 
            });
            this.stopSpinning();
        }).catch( (error) => {
            this.stopSpinning();
        });
        
    }

    getProviderArray(name){
        let provider = _.find(ASSETS.DATA, (provider) =>{
            return provider.name === name;
        });
        return provider;
    }

    getCountries(){

        axios.get(server.SERVER_URL+':'+server.SERVER_PORT+get_countries_url).then( (response) => {
            Dispatcher.dispatch({
                actionType: ActionTypes.GET_COUNTRY,
                payload: response.data
            });
            this.stopSpinning();
        }).catch( (error) => {
            this.stopSpinning();
        });
        
    }

    cleanOffers(){
        Dispatcher.dispatch({
            actionType: ActionTypes.CLEAN_OFFER,
            payload: null
        });
    }

    cleanOrders(){
        Dispatcher.dispatch({
            actionType: ActionTypes.CLEAN_ORDER,
            payload: null
        });
    }

    cleanLabel(){
        Dispatcher.dispatch({
            actionType: ActionTypes.CLEAN_LABEL,
            payload: null
        });
    }

    getOffer(providerName, selected_country, selected_zipcode, parcels){
        let providerStructure = this.getProviderArray(providerName);
        axios.get(get_provider_url+providerName+'.json').then( (response) => {
            
            let totalPrice = 0;
            _.forEach(parcels, (parcel) => {
                let price = PopuateDPDPricing(response.data, selected_country, selected_zipcode, parcel.weight);
                totalPrice = (parseFloat(totalPrice) + parseFloat(price)).toFixed(2);
            });
            let provider = null;
            if(totalPrice && totalPrice>0){
                provider = providerStructure;
                provider.price = totalPrice;
            }
            
            Dispatcher.dispatch({
                actionType: ActionTypes.GET_OFFER,
                payload: provider
            });
            
            this.stopSpinning();
        }).catch( (error) => {
            this.stopSpinning();
        });
        
    }

    stopSpinning(){
        Dispatcher.dispatch({
            actionType: ActionTypes.STOP_SPINNER,
            payload: null 
        });
    }
 
}
 
export default new ParcelActions();
import { EventEmitter } from 'events'
import Dispatcher from '../dispatcher'
import ActionTypes from '../constants'
import server from '../constants/server'
 
const CHANGE = 'CHANGE';
const SPINNER_CHANGE = 'SPINNER_CHANGE';
let _parcelState={
    countires: [],
    offers: [],
    send_result: [],
    label: null,
    sent_shipment: []
};
 
class ParcelStore extends EventEmitter {
 
    constructor() {
        super();
 
        // Registers action handler with the Dispatcher.
        Dispatcher.register(this._registerToActions.bind(this));
    }
 
    // Switches over the action's type when an action is dispatched.
    _registerToActions(action) {
        switch(action.actionType) {

            case ActionTypes.GET_COUNTRY:
                _parcelState.countries = action.payload;
                this.emit(CHANGE);
                break;

            case ActionTypes.GET_OFFER:
                if(action.payload){
                    _parcelState.offers.push(action.payload);
                }
                this.emit(CHANGE);
                break;

            case ActionTypes.CLEAN_OFFER:
                _parcelState.offers = [];
                break;

            case ActionTypes.CLEAN_ORDER:
                _parcelState.send_result = [];
                break;

            case ActionTypes.CLEAN_LABEL:
                _parcelState.label = null;
                break;

            case ActionTypes.SEND_PARCEL:
                if(action.payload){
                    _parcelState.send_result = action.payload;
                }
                this.emit(CHANGE);
                break;

            case ActionTypes.PRINT_LABEL:
                if(action.payload){
                    _parcelState.label = action.payload;
                }
                this.emit(CHANGE);
                break;

            case ActionTypes.GET_SENT_SHIPMENT:
                _parcelState.sent_shipment = action.payload;
                this.emit(CHANGE);
                break;

            case ActionTypes.STOP_SPINNER:
                this.emit(SPINNER_CHANGE);
                break;


        }
    }
 
    // Adds a new item to the list and emits a CHANGED event. 
    getCountries() {
        return _parcelState.countries;
    }

    getSentShipments(){
        return _parcelState.sent_shipment;
    }

    getPrintLabel(){
        return _parcelState.label;
    }

    getSendResult(){
        return _parcelState.send_result;
    }

    getOffers(){
        return _parcelState.offers;
    }
 
    // Hooks a React component's callback to the CHANGED event.
    addChangeListener(callback) {
        this.on(CHANGE, callback);
    }
    addSpinnerChangeListener(callback) {
        this.on(SPINNER_CHANGE, callback);
    }
 
    // Removes the listener from the CHANGED event.
    removeChangeListener(callback) {
        this.removeListener(CHANGE, callback);
    }

    removeSpinnerChangeListener(callback) {
        this.removeListener(SPINNER_CHANGE, callback);
    }
}
 
export default new ParcelStore();
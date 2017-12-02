import React, {Component} from 'react';
import ParcelStore from '../stores/ParcelStore';
import ParcelActions from '../actions/ParcelActions';

import Spinner from './Spinner';

class FormListParcel extends Component {
	
	constructor(props) {
		super(props);
		this.state = {
			loading: true,
			shipments: []
		};

		this._onChangeStopSpinner = this._onChangeStopSpinner.bind(this);
		this._onChangeGetShipments = this._onChangeGetShipments.bind(this);

		ParcelStore.addChangeListener(this._onChangeGetShipments);
		ParcelStore.addSpinnerChangeListener(this._onChangeStopSpinner);
	
	}
	
	componentWillReceiveProps(newProps){
		 
	}

	componentWillUnmount(){
		ParcelStore.removeChangeListener(this._onChangeGetShipments);
		ParcelStore.removeSpinnerChangeListener(this._onChangeStopSpinner);
	}
	componentDidMount(){
		ParcelActions.getSentShipments();
	}

	_onChangeStopSpinner(){
    	this.setState({
    		loading: false
    	});
    }

    _onChangeGetShipments(){
    	let shipments = ParcelStore.getSentShipments();
    	this.setState({
    		shipments: shipments
    	});
    }

	render(){
	
		let vm = this;
		
		let spinner = null;

        if(vm.state.loading){
            spinner = <Spinner />
        }

        let shipments = vm.state.shipments.map((shipment, i) =>{
        	console.log(shipment.id);
        	return( 
        		<tr key={i}>
			        <th scope="row" className="align-middle small text-center">{i+1}</th>
			        <td className="align-middle small">{shipment.first_name}</td>
			        <td className="align-middle small">{shipment.last_name}</td>
			        <td className="align-middle small">{shipment.from_company}</td>
			        <td className="align-middle small">{shipment.to_company}</td>
			        <td className="align-middle small">{shipment.shippingdate}</td>
			     </tr>
			);
        });

		return (

			<div className='container bg-white'>
				{spinner}
				<table className="table table-striped table-bordered table-responsive-md m-0">
					<thead>
				      <tr>
				        <th scope="col" className="small text-center">#</th>
				        <th scope="col" className="small">First Name</th>
				        <th scope="col" className="small">Last Name</th>
				        <th scope="col" className="small">From Company</th>
				        <th scope="col" className="small">To Company</th>
				        <th scope="col" className="small">Shipping Date</th>
				      	
				      </tr>
				    </thead>
				    <tbody>
				      {shipments}
				    </tbody>
				</table> 
				
			</div>
		);
	}
}

export default FormListParcel;
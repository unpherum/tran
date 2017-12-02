import React, {Component} from 'react';
import ParcelActions from '../actions/ParcelActions';
import ParcelStore from '../stores/ParcelStore';
import Popup from 'react-popup';

class OrderConfirmation extends Component{

	constructor(props){
		super(props);
		this.state = {
			parcels: this.props.parcels,
			label: ''
		};

		//Bind actions
		this.printLabel = this.printLabel.bind(this);
		this._onChangePrintLabel = this._onChangePrintLabel.bind(this);
		this.onSuccessGetLabel = this.onSuccessGetLabel.bind(this);


		//add listener
		ParcelStore.addChangeListener(this._onChangePrintLabel);
	}

	printLabel(parcel){

		this.props.setLoading(true);
		ParcelActions.printLabel(parcel);

	}

	componentDidMount(){
		ParcelActions.cleanLabel();
		console.log('order confirmation component did mount!');
	}

	_onChangePrintLabel(){
		
		let label = ParcelStore.getPrintLabel();
        this.setState({
            label: label
        });

        if(label){
        	this.onSuccessGetLabel();
        }

	}

	componentWillUnmount(){
		ParcelStore.removeChangeListener(this._onChangePrintLabel);
	}
	onSuccessGetLabel(){
		Popup.create({
		    title: 'Print Label',
		    content: 'Your Label is ready to print click on Print now button to prview and print!',
		    className: 'alert success',
		    closeOnOutsideClick: false,
		    buttons: {
		        right: [
		        	{
					    text: 'Close',
					    className: 'special-btn', // optional
					    action: function (popup) {

					    	ParcelActions.cleanLabel();
					        popup.close();
					        //window.location.reload();
					    }
					}
		        ],
		        left: [
		        	{
					    text: 'Print now',
					    className: 'success', // optional
					    action: function (popup) {
					        let printContents = document.getElementById('print-label').innerHTML;
				            let popupWin = window.open('', '_blank', 'width=1024,height=1500');
				            popupWin.document.open();
				            popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + printContents + '</body></html>');
				            popupWin.document.close();
					        
					    }
					}
		        ]
		    }
		}, false);
	}

	render(){

		let vm = this;

		let image = null;
		if(vm.state.label!==''){
			image = 'data:image/png;base64,'+vm.state.label;
		}
		
		let parcelRow = null;
		if(vm.state.parcels.length>0){
			parcelRow = vm.state.parcels.map((parcel, i)=>(
					      <tr key={i}>
					        <th scope="row" className="align-middle small text-center">{i+1}</th>
					        <td className="align-middle small">{parcel.parcelnumber}</td>
					        <td className="align-middle small">{parcel.barcode}</td>
					        <td className="align-middle small">{parcel.type}</td>
					        <td className="align-middle text-center">
					        	<button className="btn btn-raised btn-info" type="button" onClick={() => vm.printLabel(parcel)}>Download Label</button>
					        </td>
					      </tr>
				    	));
		}


		return(

			<div className="col-12 px-2">
		  
				<table className="table table-striped table-bordered table-responsive-md m-0">
					<thead>
						<tr>
							<th scope="col" className="small text-center">#</th>
							<th scope="col" className="small">Parcel Number</th>
							<th scope="col" className="small">Barcode</th>
							<th scope="col" className="small">Type</th>
							<th scope="col" className="small">Actions</th>
						</tr>
					</thead>
					<tbody>
						{parcelRow}
					</tbody>

				</table> 
				

				<Popup />
				
				<p className="hidden" id="print-label">
					<img src={image} width="1024" height="700" />
				</p>

			</div>

		);
	}
}

export default OrderConfirmation;
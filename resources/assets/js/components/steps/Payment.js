import React, {Component} from 'react';
import StepperMaster from './StepperMaster';
import Spinner from '../Spinner';

class Payment extends Component {

	constructor(props) {

		super(props);
		this.state = {
			shipment: this.props.shipment,
			paysuccess: true
		};

		//Binding actions
		this.onClickGoBack = this.onClickGoBack.bind(this);
		this.onPay = this.onPay.bind(this);
  	}

  	componentDidMount(){
	
  	}

  	onPay(){
  		this.props.goNext();
  	}

  	onClickGoBack(){
		this.props.goBack();
	}

  	render(){

  		let vm = this;

  		let spinner = null;
/*  		setTimeout(() => {
  			vm.setState({
  				paysuccess: true
  			});
  		}, 3000);*/
        if(!vm.state.paysuccess){
            spinner = <Spinner />
        }

		return (
	  		<div className="step step-payment">
	  			{spinner}
				<StepperMaster step={3} />

				<div className="pt-3 pb-4 text-center">
					<i className="mdi mdi-credit-card mdi-36px text-muted"></i>
					<h1 className="h4 text-info text-uppercase">Paiement de la commande</h1>
				</div>

				<div className="row px-2">

					<div className="col-12 px-2 mt-3 text-center">
						Résumé de ma commande<br />
						Vous allez être rediriger vers la page de paiement sécurisée par Société Générale
					</div>

					<div className="col-6 px-2 mt-3">
						<button className="btn btn-raised btn-info" onClick={vm.onClickGoBack}>Retour</button>
					</div>
					<div className="col-6 px-2 mt-3 text-right">
						<button className="btn btn-raised btn-info" onClick={vm.onPay}>Pay</button>
					</div>
				</div>

			</div>
		);
  	}
}
export default Payment;
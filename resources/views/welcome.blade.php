@extends('layouts.master')

@section('title')
    Boxtoshop
@endsection

@section('style')
    
@endsection

@section('content')
    <section class="owl-home owl-carousel owl-theme mx-auto">
        <div class="item">
            <section class="hero slide-1">
                <div>
                    <h1>L'envoi de colis moins cher et plus simple</h1>
                    <a class="btn btn-raised btn-info btn-lg" href="/parcel">Envoyer un colis</a>
                </div>
            </section>
        </div>
        <div class="item">
            <section class="hero slide-2">
                <div>
                    <h1>2 L'envoi de colis moins cher et plus simple</h1>
                    <a class="btn btn-raised btn-info btn-lg" href="/static.php">Voir les tarifs</a>
                </div>
            </section>
        </div>          
    </section>  
    

    <section class="container-fluid inner-shadow px-0 py-5 partners">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <i class="mdi mdi-truck-fast mdi-36px"></i>
                    <h2>Nos transporteurs</h2>
                </div>
                <div class="col-12 py-5 text-center">
                    <p class="mb-0">Jusqu’à 75 % de remise chez nos 4 transporteurs partenaires</p>
                    <p class="mb-0">(sans condition de volume ni d’engagement).</p>
                    <p class="mb-0">Gérez tous vos envois à domicile, express ou en relais, en France et à l'international.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a class="item" href="#"><img class="wow fadeInUp" src="/img/transporter/dpd.png" alt="Dpd" /></a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a class="item" href="#"><img class="wow fadeInUp" src="/img/transporter/chronopost.png" alt="Chronopost" /></a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a class="item" href="#"><img class="wow fadeInUp" src="/img/transporter/colissimo.png" alt="Colissimo" /></a>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <a class="item" href="#"><img class="wow fadeInUp" src="/img/transporter/gls.png" alt="Gls" /></a>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid px-0 py-5 bg-white">
        <div class="container">
            <h3 class="text-center text-uppercase">Nos avantages</h3>
            <div class="pt-5">
                <h4 class="text-info">Simplifier l’envoi de vos colis en France et à l'international.</h4>
                <p>Nous savons que la livraison est une étape cruciale de votre business. Notre solution permet à nos clients de gérer tous leurs envois depuis une seule interface Web. Du premier au dernier kilomètre, en passant par le suivi de colis, notre offre couvre toutes les étapes du transport, du conseil en amont jusqu’au SAV. En plus vous économisez jusqu'à -75% sur vos expéditions !</p>
            </div>
            <div class="pt-5">
                <h4 class="text-info">Faites des économies.</h4>
                <p>Exemple d'économie</p>
                <table class="table table-striped table-bordered table-responsive-md">
                  <thead>
                    <tr>
                      <th scope="col">Transporteur</th>
                      <th scope="col">Poids</th>
                      <th scope="col">Départ</th>
                      <th scope="col">Destination</th>
                      <th scope="col">Tarif</th>
                      <th scope="col" class="text-center">Economie</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Colissimo</td>
                      <td>30.00kg</td>
                      <td>Aubervilliers</td>
                      <td>Lyon</td>
                      <td><del class="text-muted">32.00€</del> 28.00€</td>
                      <td class="text-center"><span class="badge badge-danger">-30%</span></td>
                    </tr>
                    <tr>
                      <td>Dpd</td>
                      <td>20.00kg</td>
                      <td>Aubervilliers</td>
                      <td>Bordeaux</td>
                      <td><del class="text-muted">25.00€</del> 20.00€</td>
                      <td class="text-center"><span class="badge badge-danger">-35%</span></td>
                    </tr>
                    <tr>
                      <td>Chronopost</td>
                      <td>12.00kg</td>
                      <td>Aubervilliers</td>
                      <td>Lille</td>
                      <td><del class="text-muted">22.00€</del> 18.00€</td>
                      <td class="text-center"><span class="badge badge-danger">-40%</span></td>
                    </tr>
                    <tr>
                      <td>Gls</td>
                      <td>12.00kg</td>
                      <td>Aubervilliers</td>
                      <td>Marseille</td>
                      <td><del class="text-muted">22.00€</del> 11.00€</td>
                      <td class="text-center"><span class="badge badge-danger">-50%</span></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-12 col-md-6 py-5">
                        
                        <div class="owl-arguments owl-carousel owl-theme">
                            <div class="item">
                                <img class="img-fluid" src="/img/home-arg1-step1.png" alt="étape 1" />
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="/img/home-arg1-step2.png" alt="étape 2" />
                            </div>  
                            <div class="item">
                                <img class="img-fluid" src="/img/home-arg1-step3.png" alt="étape 3" />
                            </div>              
                        </div>
    
                    </div>
                    <div class="col-12 col-md-6">
                        
                        <h4 class="text-info mb-3 text-center">Expédiez en 3 étapes</h4>
                        <ol class="arguments">
                            <li class="arguments-step-1 highlight">
                                <strong>Créez vos expéditions</strong>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </li>
                            <li class="arguments-step-2">
                                <strong>Programmez votre collecte</strong>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </li>
                            <li class="arguments-step-3">
                                <strong>Suivez vos expéditions</strong>
                                <p class="text-muted">Envoyez le tracking number à votre destinataire.</p>
                            </li>
                        </ol>
                        <div class="text-center pt-3">
                            <a class="btn btn-raised btn-info" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid inner-shadow px-0 py-5 points">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <i class="mdi mdi-map-marker mdi-36px"></i>
                    <h3 class="text-uppercase">Nos points d'expédition</h3>
                </div>
                <div class="col-12 py-5 text-center">
                    <p class="mb-0">Profitez de notre service d'expédition depuis un de nos magasins partenaires au Centre CIFA et Fashion Center Paris</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="text-uppercase h6 text-muted">Centre CIFA</h4>
                </div>
            </div>
            <div class="row px-2">
                <div class="col-6 col-lg-4 p-2">
                    <a class="item" href="#"><img src="/img/parisfashionshops.jpg" alt="PARIS FASHION SHOPS" /></a>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <a class="item" href="#"><img src="https://parisfashionshops.com/cdn/images/brand/101idees/logo.jpg" alt="101 Idees" /></a>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <a class="item" href="#"><img src="https://parisfashionshops.com/cdn/images/brand/chic-nana/logo.jpg" alt="Chic Nana" /></a>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <a class="item" href="#"><img src="https://parisfashionshops.com/cdn/images/brand/a0158000004AqiJAAS-logo.jpg" alt="Colynn" /></a>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <a class="item" href="#"><img src="https://parisfashionshops.com/cdn/images/brand/daphnea/logo.jpg" alt="Daphnea" /></a>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <a class="item" href="#"><img src="https://parisfashionshops.com/cdn/images/brand/hnathalie/logo.jpg" alt="H&Nathalie" /></a>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <h4 class="text-uppercase h6 text-muted">Fashion Center Paris</h4>
                </div>
            </div>          
            <div class="row p-2">
                <div class="col-6 col-lg-4 p-2">
                    <div class="item"><img src="https://parisfashionshops.com/cdn/images/brand/by-clara/logo.jpg" alt="By Clara" /></div>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <div class="item"><img src="https://parisfashionshops.com/cdn/images/brand/a0158000006g5WWAAY-logo.jpg" alt="Eight Paris" /></div>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <div class="item"><img src="https://parisfashionshops.com/cdn/images/brand/a0158000006dMXFAA2-logo.jpg" alt="Garconne" /></div>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <div class="item"><img src="https://storage.googleapis.com/cdn-parisfashionshops/images/brand/labottinesouriante/logo.jpg" alt="La Bottine Souriante" /></div>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <div class="item"><img src="https://parisfashionshops.com/cdn/images/brand/a0158000005TpLuAAK-logo.jpg" alt="Luzabelle" /></div>
                </div>
                <div class="col-6 col-lg-4 p-2">
                    <div class="item"><img src="https://storage.googleapis.com/cdn-parisfashionshops/images/brand/paj-concept/logo.jpg" alt="PAJ Concept" /></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="item"><a href="#" class="text-info">Voir tous les magasins partenaires</a></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('js/script.js')}}" /></script>
@endsection

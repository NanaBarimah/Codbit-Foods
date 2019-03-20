@extends('layouts.dashboard', ['page' => 'deals'])
@section('styles')
    <link rel="stylesheet" href="{{asset('css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/dropzone.min.css')}}" />
    <style>
    .deals-title{
            padding-bottom: 12px;
            margin-left: 12px;
            display: inline-block;
            border-bottom: #aaa 4px solid;
        }

        h6{
            padding-bottom: 12px;
            margin-left: 12px;
            display: inline-block;
        }

        .dn{
            display:none;
        }
    </style>
@endsection
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>Deals and Promotions</h1>
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb pt-0">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Deals and promotions</li>
                            </ol>
                        </nav>
                    </div>
                    <ul class="nav nav-tabs separator-tabs ml-0 mb-5" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="deals-tab" data-toggle="tab" href="#deals" role="tab"
                                aria-controls="first" aria-selected="true">DEALS</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="promotions-tab" data-toggle="tab" href="#promotions" role="tab"
                                aria-controls="second" aria-selected="false">PROMOTIONS</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                    <div class="row mb-4">
                        <h6>
                            Ongoing Deals
                        </h6>
                        <div class="col-md-12 mb-4 pl-0 pr-0">

                            <div class="owl-container">

                                <div class="owl-carousel basic">

                                    @foreach($ongoing_deals as $deal)
                                    <div class="card flex-row">
                                        <div class="w-50 position-relative">
                                            <img class="card-img-left" src="img/deals_promotions/{{$deal->image}}" alt="{{$deal->title}}">
                                            <span class="badge badge-pill badge-theme-1 position-absolute badge-top-left">{{Carbon\Carbon::parse($deal->created_at)->diffForHumans()}}</span>
                                        </div>
                                        <div class="w-50">
                                            <div class="card-body">
                                                <h6 class="mb-4">{{$deal->title}}</h6>
                                                <p class="text-muted text-small">{{$deal->description}}</p>
                                                <footer>
                                                    <p class="text-muted text-small mb-0 font-weight-light">Expires {{Carbon\Carbon::parse($deal->expires_at)->diffForHumans()}}</p>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class=" slider-nav text-center">
                                    <a href="#" class="left-arrow owl-prev">
                                        <i class="simple-icon-arrow-left"></i>
                                    </a>
                                    <div class="slider-dot-container"></div>
                                    <a href="#" class="right-arrow owl-next">
                                        <i class="simple-icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="card pt-4">
                                <div class="card-header">
                                    <h6 class="deals-title">
                                        Add New
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="#" id="new_deal">
                                        <label class="form-group has-float-label mb-4">
                                            <span>&nbsp;Title&nbsp;</span>
                                            <input class="form-control" name="title" required/>
                                        </label>
                                        <label class="form-group has-float-label mb-4">
                                            <span>&nbsp;Description&nbsp;</span>
                                            <textarea class="form-control" name="description" required></textarea>
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <label class="form-group has-float-label mb-4">
                                                    <span>&nbsp;Start Date&nbsp;</span>
                                                    <input class="form-control" name="starts_at" required/>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <label class="form-group has-float-label mb-4">
                                                    <span>&nbsp;End Date&nbsp;</span>
                                                    <input class="form-control" name="expires_at" required/>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="col-12 dropzone" id="dealImage">
                                            </div>
                                            <span class="text-small text-danger dn" id="image-error">An image is required</span>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right" id="submit-deal"><b>Save Deal</b></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="pt-4">
                                <div>
                                    <h6 class="deals-title">
                                        All Deals
                                    </h6>
                                </div>
                                <div>
                                    @foreach($deals as $deal)
                                    <div class="card d-flex flex-row mb-3">
                                        <a class="d-flex" href="#">
                                            <img src="/img/deals_promotions/{{$deal->image}}" alt="{{$deal->title}}" class="list-thumbnail responsive border-0" />
                                        </a>
                                        <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                            <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                                <a href="#" class="pr-4 w-30 w-sm-100">
                                                    <p class="list-item-heading mb-1 truncate">{{$deal->title}} </p>
                                                </a>
                                                <p class="mb-1 mr-2 text-small w-30 w-sm-100 truncate"><a href="#">{{$deal->description}}</a></p>
                                                <p class="mb-1 mr-1 text-muted text-small w-20 w-sm-100 truncate">{{Carbon\Carbon::parse($deal->starts_at)->format('Y/m/d')}}</p>
                                                <p class="mb-1 text-muted text-small text-right w-15 w-sm-100">{{Carbon\Carbon::parse($deal->expires_at)->format('Y/m/d')}}</p>
                                                <div class="w-15 w-sm-100 text-right">
                                                    &nbsp;
                                                </div>
                                                
                                                <div class="w-15 w-sm-100 text-right">
                                                    <div class="btn-group float-right mr-1 mb-1">
                                                        <button class="btn btn-light btn-xs dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" pl-1 align-self-center pr-4">

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="promotions" role="tabpanel" aria-labelledby="promotions-tab">
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{asset('js/vendor/select2.full.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/vendor/dropzone.min.js')}}"></script>
@endsection

@section('customjs')
    <script>
        function initCarousel(){
            if ($(".owl-carousel.basic").length > 0) {
          $(".owl-carousel.basic")
            .owlCarousel({
              margin: 30,
              stagePadding: 15,
              dotsContainer: $(".owl-carousel.basic")
                .parents(".owl-container")
                .find(".slider-dot-container"),
              responsive: {
                0: {
                  items: 1
                },
                600: {
                  items: 2
                },
                1000: {
                  items: 3
                }
              }
            })
            .data("owl.carousel")
            .onResize();
            }
        }

        $(document).ready(function(){
            initCarousel();

            Dropzone.autoDiscover = false;

             $('#dealImage').dropzone({
                url: '/api/deals/add',
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 5,
                maxFiles: 5,
                maxFilesize: 1,
                acceptedFiles: 'image/*',
                thumbnailWidth: 160,
                previewTemplate: '<div class="dz-preview dz-file-preview mb-3"><div class="d-flex flex-row "> <div class="p-0 w-30 position-relative"> <div class="dz-error-mark"><span><i class="simple-icon-exclamation"></i>  </span></div>      <div class="dz-success-mark"><span><i class="simple-icon-check-circle"></i></span></div>      <img data-dz-thumbnail class="img-thumbnail border-0" /> </div> <div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative"> <div> <span data-dz-name /> </div> <div class="text-primary text-extra-small" data-dz-size /> </div> <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>        <div class="dz-error-message"><span data-dz-errormessage></span></div>            </div><a href="#" class="remove" data-dz-remove> <i class="simple-icon-trash"></i> </a></div>',
                init: function() {
                    dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                    // for Dropzone to process the queue (instead of default form behavior):
                    $("#new_deal").on("submit", function(e) {
                        // Make sure that the form isn't actually being sent.
                        e.preventDefault();
                        var error = false;

                        $(this).find('input, textarea').each(function(){
                            if($(this).val() == '' || $(this).val() == null){
                                error = true;
                            }else{
                                error = false;
                            }
                        });

                        if(dzClosure.getQueuedFiles().length < 1){
                            $('#image-error').css('display', 'block');
                            error = true;
                        }else{
                            $('#image-error').css('display', 'none');
                            error = false;
                        }
                        
                        if(!error){
                            $('#submit-deal').prop('disabled', true);
                            $('#submit-deal').html('<div class="lds-dual-ring-white"></div>');
                            
                            dzClosure.processQueue();
                        }
                        
                    });

                    //send all the form data along with the files:
                    this.on("sendingmultiple", function(data, xhr, formData) {
                        $('#new_deal').find('input, textarea').each(function(){
                            formData.append($(this).attr('name'), $(this).val())
                        });
                    });

                    this.on("success", function(response, responseText){
                        $('#submit-deal').html('Save');
                        $('#submit-deal').prop('disabled', false);

                        var data = responseText;
                        console.log(data);
                        
                        if(data.error){
                            $.notify({
                                // options
                                message: data.message
                            },{
                                // settings
                                type: 'danger'
                            });
                        }else{
                            $.notify({
                                // options
                                message: data.message
                            },{
                                // settings
                                type: 'success'
                            });

                            dzClosure.removeAllFiles();
                            $("#new-item-form").trigger('reset');
                            setTimeout(function(){
                                    location.reload();
                                }, 500);
                        }
                    });

                    this.on('error', function(err, desc){
                        $('#submit-deal').html('Save');
                        $('#submit-deal').prop('disabled', false);

                        if(!desc.includes("File is too big")){

                            console.log(err);
                            console.log(desc);
                            $.notify({
                                    // options
                                    message: "Network error. Try again."
                                },{
                                    // settings
                                    type: 'danger'
                            });
                        }else{
                            $('#image-error').css('display', 'block');
                            $('#image-error').html(desc);
                        }
                        
                    });
                    
                }
            });
        })
    </script>
@endsection
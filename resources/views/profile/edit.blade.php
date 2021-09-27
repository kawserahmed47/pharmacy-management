@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{asset(Auth::user()->cover_photo)}}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-md-12 col-lg-7">
                    <h1 class="display-2 text-white"> Hello {{auth()->user()->name}} </h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see all of your personal data and manage your details with valid information.</p>
                </div>
            </div>
        </div>
    </div> 

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">


                        <form method="post" id="profileUpdateForm"  enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
                       
                            <div class="pl-lg-4">

                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative " placeholder="{{ __('Name') }}" value="{{ auth()->user()->name }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="{{ __('Email') }}" value="{{auth()->user()->email}}" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-image">{{ __('Change Profile Picture') }}</label> <br>
                                            <input type="file" name="profile_picture" class="input-image">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-cover-image">{{ __('Change Cover Photo') }}</label> <br>
                                            <input type="file" name="cover_photo"  class="input-cover-image">
                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-image">{{ __('Profile Picture Preview') }}</label>
                                        @if (Auth::user()->profile_picture)
                                            <img style="max-width:100%; max-height:300px;" class="card preview-image" src="{{ asset(Auth::user()->profile_picture) }}" alt="" srcset="">
                                        @else
                                            <img style="max-width:100%; max-height:300px;" class="card preview-image" src="{{ asset('assets') }}/img/default/no-image-found.jpg" alt="" srcset=""> 
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-control-label" for="input-image">{{ __('Cover Photo Preview') }}</label>
                                        
                                        @if (Auth::user()->cover_photo)
                                            <img class="card preview-cover-image" style="max-width:100%; max-height:300px;" src="{{asset(Auth::user()->cover_photo)}}" alt="Cover Photo" srcset="">
                                        @else 
                                            <img class="card preview-cover-image" style="max-width:100%; max-height:300px;" src="{{asset('assets')}}/img/default/no-cover-photo-found.png" alt="Cover Photo" srcset="">
                                        @endif
                                       
                                    </div>

                                </div>

                              

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update Profile') }}</button>
                                </div>
                            </div>
                        </form>


                        <hr class="my-4" />
                        {{-- profile.password --}}
                        <form method="post" id="passwordChangeForm" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                    

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                 
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>


@endsection


@push('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    

    <script>

        $(document).ready(function(){
    

            $("#profileUpdateForm").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{route('profile.update')}}",
                    data:new FormData(this),
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success:function(response){
                        console.log(response);

                        Toast.fire({
                            type: 'success',
                            title: response.message
                        })


                    },
                    error:function(error){
                        console.log(error);
                    
                        Toast.fire({
                            type: 'error',
                            title: 'Server Error'
                        })
                    }

                })
                
            })

            $("#passwordChangeForm").on('submit', function(e){


                e.preventDefault();


                var password = $("#input-password").val();
                var cpassword = $("#input-password-confirmation").val();


                if(password == cpassword){

                    $.ajax({
                    url: "{{route('profile.password')}}",
                    data:new FormData(this),
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success:function(response){
                        console.log(response);

                        if(response.status){

                            Toast.fire({
                                type: 'success',
                                title: response.message
                            })

                        }else{

                            Toast.fire({
                                type: 'error',
                                title: response.message
                            })

                        }
                       


                    },
                    error:function(error){
                        console.log(error);
                    
                        Toast.fire({
                            type: 'error',
                            title: error.message
                        })
                    }

                })


                }else{

                    Toast.fire({
                            type: 'error',
                            title: "New password and confirm password does not match."
                        })

                }

               


            })


        })



    </script>
    
@endpush

@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
       
            <div class="header-body">
                <!-- Card stats -->

                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                      <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
                      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#">Tables</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Tables</li>
                        </ol>
                      </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                      <a href="#" class="btn btn-sm btn-neutral">New</a>
                      <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                  </div>
               
            </div>
        </div>
        </div>


    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="" class="btn btn-sm btn-primary">Add user</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                                            </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                                                    <tr>
                                        <td>Admin Admin</td>
                                        <td>
                                            <a href="mailto:admin@argon.com">admin@argon.com</a>
                                        </td>
                                        <td>12/02/2020 11:00</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                            <a class="dropdown-item" href="">Edit</a>
                                                                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>


    
@endsection



 
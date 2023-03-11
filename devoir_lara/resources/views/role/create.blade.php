@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SEN EMPLOI</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" style="background-color:deepskyblue;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                           
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


    @if ($role)
    <table class="table table-bordered">
        <tr>
            
            
            <th>Votre Rôle Actuel</th>
           
        </tr>
       
        <tr>
            <td>@if ($role->role_id==1)
                Entreprise
            @else
                Demandeur
            @endif</td>
           

        </tr>
       
    </table>
  
        
    @endif
                <div>Choix du rôle</div>
                <form action="{{ route('roleUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                     <div class="row">
                        
                    <input type="text" hidden value=" {{ Auth::user()->id }}"  name="user_id"  >
                               
                          
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               
                                <select class="form-select" aria-label="Default select example" name="role_id">
                                    <option selected>Choisir entre Demandeur et Entreprise </option>
                                  
                                    <option value="2">Demandeur</option>
                                    <option value="1">Entreprise</option>
                                   
                                  </select>                         
                                </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                     
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</html>
@endsection

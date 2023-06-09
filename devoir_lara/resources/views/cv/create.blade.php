@extends('layouts.app')

@section('content')
<body style="background-image: url('assets/img/home-bg.jpg')">
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


 
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                     <div class="row">
                        
                                <input type="text" hidden value=" {{ Auth::user()->id }}"  name="user_id"  >
                               
                          
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               
                                <select class="form-select" aria-label="Default select example" name="metier_id">
                                    <option selected>Votre Domaine</option>
                                    @foreach ($metier as $met)
                                    <option value="{{ $met->id }}">{{ $met->nom }}</option>
                                    @endforeach
                                  </select>                         
                                </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Age:</strong>
                               
                                <input type="number" name="age" class="form-control" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Adresse:</strong>
                               
                                <input type="text" name="adresse" class="form-control" >
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Téléphone:</strong>
                               
                                <input type="text" name="telephone" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <select class="form-select" aria-label="Default select example" name="niveau">
                                    <option selected>Niveau d'étude</option>
                                   
                                    <option value="Bac">Bac</option>
                                    <option value="Bac+1">Bac+1</option>
                                    <option value="Bac+2">Bac+2</option>
                                    <option value="Bac+3">Bac+3</option>
                                    <option value="Bac+4">Bac+4</option>
                                    <option value="Bac+5">Bac+5</option>
                                  
                                </select>    
                                
                           </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Experience:</strong>
                               
                                <input type="text" name="experience" class="form-control" placeholder="experience">
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
</body>
@endsection

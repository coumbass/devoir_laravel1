




@extends('layouts.app')

@section('content')
<body style="background-image: url('assets/img/home-bg.jpg')">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">@if (isset($role))
                    @if ( $role->role_id==1)Voir Emplois 
                @endif
                @if ( $role->role_id==2)Offres d'Emplois disponibles
                @endif
                @endif
                </div>

                <div class="card-body" style="background-color:deepskyblue;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                           
                        </div>
                    @endif

@if (isset($role))
@if ( $role->role_id==1)

<div class="pull-right">
    <a class="btn btn-success" href="{{ route('emploi.create',Auth::user()->id) }}"> Ajouter une Offre</a>
</div>
<table class="table table-bordered">
    <tr>
        
<th>Logo</th>
<th>Entreprise</th>
<th>Nom </th>
<th>Categorie</th>
<th>Details</th>
<th>Email</th>
<th>Lieu</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($emploi as $emploi)
    <tr>
        
        <td><img src="images/{{ $emploi->logo }}" height="80" width="80" alt="logo"></td>
        <td>{{ $emploi->user->name }}</td>
        <td>{{ $emploi->nom }}</td>
        <td>{{ $emploi->metier->nom }}</td>
        <td>{{ $emploi->details }}</td>
        <td>{{ $emploi->user->email }}</td>
        <td>{{ $emploi->lieu }}</td>
        <td>
           
            <form action="{{ route('destroy.emploi') }}" method="POST">
  
                <a class="btn btn-primary" href="{{ route('edit.emploi',$emploi->id) }}">Edit</a>
                <a href="{{ route('postulants',$emploi->id) }}" class="btn btn-info">  Postulants   </a>

                @csrf
               
               <input hidden type="text" hidden value="{{$emploi->id}}" name="id">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

 @else
</div>  

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
<div style="display:inline-flex;">
    <div class="m-2 ">
        <form action="{{route('search')}}" method="post">
            @csrf
            
                <div class="form-group "> 
                    <select class="form-select" onchange="this.form.submit()" name="category">
                        <option value="" >Choisir une Catégorie</option>
                        <option value="" >Tous</option>
                        @foreach ($metier as $met)
                        <option value="{{ $met->id }}">{{ $met->nom }}</option>
                        @endforeach
                       
                    </select>    
                    
               </div>
           
        
        </form>
        </div>

    <div class="m-2 ml-4" >
<form action="{{route('search')}}" method="post" >
    @csrf
        <div class="form-group "  >
          <input class="form-control " placeholder="rechercher" name="search" >
            
       </div>
   
</form>
</div>

</div>
<table class="table table-bordered " id="tous" style="background-color:deepskyblue;">
<tr>

    <th>Logo</th>
    <th>Entreprise</th>
    <th>Nom </th>
    <th>Categorie</th>
    <th>Details</th>
    <th>Email</th>
    <th>Lieu</th>

<th width="280px">Action</th>
</tr>
@foreach ($emplois  as $emploi)
<tr>

<td><img src="/images/{{ $emploi->logo}}" height="80" width="80"></td>
<td>{{ $emploi->user->name }}</td>
<td>{{ $emploi->nom }}</td>
<td>{{ $emploi->metier->nom }}</td>
<td>{{ $emploi->details }}</td>
<td>{{ $emploi->user->email }}</td>
<td>{{ $emploi->lieu }}</td>




<td>

   
    <form action="{{ route('postule.emploi') }}" method="POST">
        @csrf
        <input hidden value="{{ $emploi->id }}" name="emploi_id">
        <input hidden value="{{Auth::user()->id }}" name="user_id">
        @if (isset($cvs))
        <input hidden value="{{$cvs->id}}" name="cvs_id">
        @endif
       
        <button type="submit" class="btn btn-success">Postuler</button>
    </form>
</td>
</tr>
@endforeach
</table>
@endif
@else

<a href="{{ route('role',Auth::user()->id) }}" class="dropdown-item"> Rôle   </a>


@endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection

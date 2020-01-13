@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{route('briefs.index')}}">
                    {{csrf_field()}}
                    
                    <input type='text' name='name' placeholder='nom'>
                    <input type='text' name='lastname' placeholder='prénoms'>
                    <input type='date' name='date' placeholder='Date de naissance'>
                    <button type="submit">Enregistrer</button>
                </form>
                <br>
                
                <table class="table table-bordered">
                    <tr>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Date de naissance</th>
                    </tr>
                    @foreach(\App\Brief::all() as $b)
                    <tr>
                        <td>{{$b['name']}}</td>
                        <td>{{$b['lastname']}}</td>
                        <td>{{$b['date']}}</td>
                        <td>
<!-- ====================== FORMULAIRE DELETE ======================= -->
                        <form method='post' action="{{route('briefs.destroy', $b->id)}}">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button type='submit' name='valider' class="btn btn-danger">supprimer</button>
                            <a class="btn btn-primary" href="{{route('briefs.edit', $b->id)}}">Edit</a>
                        </form>

                        </td>
                        <td>

                        </td>
                        
                    </tr>
                    @endforeach   
                </table>

                <!-- ====================== FORMULAIRE DELETE ALL ======================= -->
                <form method='post' action="{{route('delete_all')}}">
                    {{ csrf_field() }}
                    <button type='submit' name='valider' class="btn btn-danger">Tout supprimer</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			
            <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Producto: {{$producto->nombre}}</h3>
            
        </div><!--columna-->
    </div><!--fila-->
           
            {!!Form::model($producto,['method'=>'PATCH','action'=>['ProductoController@update',$producto->id],'files'=>'true'])!!}

            {{Form::token()}}
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required value="{{$producto->nombre}}" class="form-control" placeholder="{{$producto->nombre}}">
                    </div>  
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="idcategoria" class="form-control"><!--con el name se valida en el productoFormRequest-->
                            <!--voy a recibir todas las categorias en una variable $categorias desde el metodo create de productoController-->
                            @foreach ($categorias as $unacategoria)
                                @if ($unacategoria->id==$producto->categoria_id)
                                <option value="{{$unacategoria->id}}" selected>{{$unacategoria->nombre}}</option><
                                @else
                                <option value="{{$unacategoria->id}}">{{$unacategoria->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>      
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" name="codigo" required value="{{$producto->codigo}}" class="form-control" placeholder="{{$producto->codigo}}">
                    </div>                      
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" required value="{{$producto->stock}}" class="form-control" placeholder="{{$producto->stock}}">
                </div>      
                    
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" value="{{$producto->descripcion}}" class="form-control" placeholder="Descripción del artículo...">
                    </div>      
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Fecha de ingreso</label>
                        <input type="date" name="fecha_ingreso" value="{{$producto->fecha_ingreso}}" class="form-control" placeholder="Fecha de ingreso del producto...">
                    </div>      
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Fecha de vencimiento</label>
                        <input type="date" name="fecha_vencimiento" value="{{$producto->fecha_vencimiento}}" class="form-control" placeholder="Fecha de vencimiento del producto...">
                    </div>      
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                        @if(($producto->imagen)!="")
                            <img src="{{ asset('imagenes/productos/'.$producto->imagen)}} " height="120px">
                        @endif
                    </div>      
                    
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>
            </div>
            {!!Form::close()!!}
	</div>

@endsection

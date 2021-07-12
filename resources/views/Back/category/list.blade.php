@extends('Back.layout.master')
@section('content')

<div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Kateqoriyalar</h3>
        </div>
        <div class="panel-body">
           <div class="container">
               <div class="row mb-30">
                   <div class="col-md-6">
                       <a href="{{ route('category.create') }}" class="btn btn-outline-secondary"><i class="fas fa-plus"></i> Əlavə et</a>
                   </div>
               </div>
               <div class="row">
                   <div class="col-xl-12">
                    <table id="example" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kateqoriya</th>
                                <th>Üst kateqoriya</th>
                                {{-- <th>Status</th> --}}
                                <th>Əməliyyat</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($categories as $category )
                            <tr>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->parent_name }}</td>
                              
                                {{-- <td> <input name="main" type="checkbox" @if($category->main == 1) checked @endif data-plugin="switchery" data-switchery="true"
                                    style="display: none;"></td> --}}
                                <td>
                                     <a class="btn btn-outline-warning" href="{{ route('category.edit',$category->id) }}"><i class="fas fa-pen"></i> Redaktə</a>
                                     {{-- <a class="btn btn-outline-danger" href="{{ route('categoryDestroy',$category->id) }}"><i class="fas fa-pen"></i> Sil</a> --}}
                                     <button class="btn btn-outline-danger"   data-toggle="modal" data-target="#exampleModal{{ $category->id }}"><i class="fas fa-pen"></i> Sil</button>
                                </td>
                            </tr>


                            <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                             <span style="color: red">Kateqoriya Silinsin?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Imtina</button>
                                            <a  href="{{ route('categoryDestroy',$category->id) }}" class="btn btn-danger">Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach                              
                                                  
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Kateqoriya</th>
                                <th>Üst kateqoriya</th>
                                {{-- <th>Status</th> --}}
                                <th>Əməliyyat</th>
                                
                            </tr>
                        </tfoot>
                    </table>
                  
                  
                   </div>
               </div>
           </div>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>   
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
 <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

@endsection

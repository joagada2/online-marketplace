@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Manage ChildCategory</h4>
            <div class="row justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Subcategory</th>
                                            <th>Childcategory</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($childcategories as $childcategory)
                                            <tr>
                                            <td class="categrory_{{$childcategory->subcategory_id}}">{{$childcategory->subcategory->name}}</td>
                                                <td>{{ $childcategory->name }}</td>
                                                <td>
                                                    <a href="{{ route('childcategory.edit', [$childcategory->id]) }}"><button
                                                            class="btn btn-sm btn-info">
                                                            <i class="mdi mdi-table-edit"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{ $childcategory->id }}">
                                                         <i class="mdi mdi-delete"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $childcategory->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ route('childcategory.destroy', $childcategory->id) }}"
                                                                method="post">@csrf
                                                                @method('DELETE')
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                            confirmation</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                       <p> Are you sure you want to delete this item ?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Yes Delete it</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <td>No childcategory to display</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <style>
                td.categrory_1 {
                    background-color: aliceblue;
                }
                td.categrory_2 {
                    background-color:bisque;
                }
                td.categrory_3 {
                    background-color:thistle;
                }
                td.categrory_4 {
                    background-color:tomato;
                }
                td.categrory_5 {
                    background-color:gray;
                }
                td.categrory_6 {
                    background-color:unset;
                }
                td.categrory_7 {
                    background-color:springgreen;
                }
                td.categrory_8 {
                    background-color:orchid;
                }
                td.categrory_9 {
                    background-color:pink;
                }
                td.categrory_10 {
                    background-color:unset;
                }
                td.categrory_11 {
                    background-color: aliceblue;
                }
                td.categrory_12 {
                    background-color:bisque;
                }
                td.categrory_13 {
                    background-color:thistle;
                }
                td.categrory_14 {
                    background-color:tomato;
                }
                td.categrory_15 {
                    background-color:gray;
                }
                td.categrory_16 {
                    background-color:unset;
                }
                td.categrory_17 {
                    background-color:springgreen;
                }
                td.categrory_18 {
                    background-color:orchid;
                }
                td.categrory_19 {
                    background-color:pink;
                }
                td.categrory_20 {
                    background-color:unset;
                }
                td.categrory_21 {
                    background-color: aliceblue;
                }
                td.categrory_22 {
                    background-color:bisque;
                }
                td.categrory_23 {
                    background-color:thistle;
                }
                td.categrory_24 {
                    background-color:tomato;
                }
                td.categrory_25 {
                    background-color:gray;
                }
                td.categrory_26 {
                    background-color:unset;
                }
                td.categrory_27 {
                    background-color:springgreen;
                }
                td.categrory_28 {
                    background-color:orchid;
                }
                td.categrory_29 {
                    background-color:pink;
                }
                td.categrory_30 {
                    background-color:unset;
                }
                td.categrory_31 {
                    background-color: aliceblue;
                }
                td.categrory_32 {
                    background-color:bisque;
                }
                td.categrory_33 {
                    background-color:thistle;
                }
                td.categrory_34 {
                    background-color:tomato;
                }
                td.categrory_35 {
                    background-color:gray;
                }
                td.categrory_36 {
                    background-color:unset;
                }
                td.categrory_37 {
                    background-color:springgreen;
                }
                td.categrory_38 {
                    background-color:orchid;
                }
                td.categrory_39 {
                    background-color:pink;
                }
                td.categrory_40 {
                    background-color:unset;
                }
                td.categrory_41 {
                    background-color: aliceblue;
                }
                td.categrory_42 {
                    background-color:bisque;
                }
                td.categrory_43 {
                    background-color:thistle;
                }
                td.categrory_44 {
                    background-color:tomato;
                }
                td.categrory_45 {
                    background-color:gray;
                }
                td.categrory_46 {
                    background-color:unset;
                }
                td.categrory_47 {
                    background-color:springgreen;
                }
                td.categrory_48 {
                    background-color:orchid;
                }
                td.categrory_49 {
                    background-color:pink;
                }
                td.categrory_50 {
                    background-color:unset;
                }
                td.categrory_51 {
                    background-color: aliceblue;
                }
                td.categrory_52 {
                    background-color:bisque;
                }
                td.categrory_53 {
                    background-color:thistle;
                }
                td.categrory_54 {
                    background-color:tomato;
                }
                td.categrory_55 {
                    background-color:gray;
                }
                td.categrory_56 {
                    background-color:unset;
                }
                td.categrory_57 {
                    background-color:springgreen;
                }
                td.categrory_58 {
                    background-color:orchid;
                }
                td.categrory_59 {
                    background-color:pink;
                }
                td.categrory_60 {
                    background-color:unset;
                }
                td.categrory_61 {
                    background-color: aliceblue;
                }
                td.categrory_62 {
                    background-color:bisque;
                }
                td.categrory_63 {
                    background-color:thistle;
                }
                td.categrory_64 {
                    background-color:tomato;
                }
                td.categrory_65 {
                    background-color:gray;
                }
                td.categrory_66 {
                    background-color:unset;
                }
                td.categrory_67 {
                    background-color:springgreen;
                }
                td.categrory_68 {
                    background-color:orchid;
                }
                td.categrory_69 {
                    background-color:pink;
                }
                td.categrory_70 {
                    background-color:unset;
                }
                td.categrory_71 {
                    background-color: aliceblue;
                }
                td.categrory_72 {
                    background-color:bisque;
                }
                td.categrory_73 {
                    background-color:thistle;
                }
                td.categrory_74 {
                    background-color:tomato;
                }
                td.categrory_75 {
                    background-color:gray;
                }
                td.categrory_76 {
                    background-color:unset;
                }
                td.categrory_77 {
                    background-color:springgreen;
                }
                td.categrory_78 {
                    background-color:orchid;
                }
                td.categrory_79 {
                    background-color:pink;
                }
                td.categrory_80 {
                    background-color:unset;
                }
                td.categrory_81 {
                    background-color:aliceblue;
                }
                td.categrory_82 {
                    background-color:bisque;
                }
                td.categrory_83 {
                    background-color:thistle;
                }
                td.categrory_84 {
                    background-color:tomato;
                }
                td.categrory_85 {
                    background-color:gray;
                }
                td.categrory_86 {
                    background-color:unset;
                }
                td.categrory_87 {
                    background-color:springgreen;
                }
                td.categrory_88 {
                    background-color:orchid;
                }
                td.categrory_89 {
                    background-color:pink;
                }
                td.categrory_90 {
                    background-color:unset;
                }
                td.categrory_91 {
                    background-color: aliceblue;
                }
                td.categrory_92 {
                    background-color:bisque;
                }
                td.categrory_93 {
                    background-color:thistle;
                }
                td.categrory_94 {
                    background-color:tomato;
                }
                td.categrory_95 {
                    background-color:gray;
                }
                td.categrory_96 {
                    background-color:unset;
                }
                td.categrory_97 {
                    background-color:springgreen;
                }
                td.categrory_98 {
                    background-color:orchid;
                }
                td.categrory_99 {
                    background-color:pink;
                }
                td.categrory_100 {
                    background-color:unset;
                }
                td.categrory_101 {
                    background-color: aliceblue;
                }
                td.categrory_102 {
                    background-color:bisque;
                }
                td.categrory_103 {
                    background-color:thistle;
                }
                td.categrory_104 {
                    background-color:tomato;
                }
                td.categrory_105 {
                    background-color:gray;
                }
                td.categrory_106 {
                    background-color:unset;
                }
                td.categrory_107 {
                    background-color:springgreen;
                }
                td.categrory_108 {
                    background-color:orchid;
                }
                td.categrory_109 {
                    background-color:pink;
                }
                td.categrory_110 {
                    background-color:unset;
                }
                td.categrory_111 {
                    background-color:pink;
                }
            </style>       
@endsection

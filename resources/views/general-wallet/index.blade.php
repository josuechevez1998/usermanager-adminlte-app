@extends('layouts.app')

@section('template_title')
    General Wallet
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('General Wallet') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('general-wallets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Month</th>
										<th>Year</th>
										<th>Balance</th>
										<th>Userid</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($generalWallets as $generalWallet)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $generalWallet->month }}</td>
											<td>{{ $generalWallet->year }}</td>
											<td>{{ $generalWallet->balance }}</td>
											<td>{{ $generalWallet->userId }}</td>

                                            <td>
                                                <form action="{{ route('general-wallets.destroy',$generalWallet->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('general-wallets.show',$generalWallet->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('general-wallets.edit',$generalWallet->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $generalWallets->links() !!}
            </div>
        </div>
    </div>
@endsection

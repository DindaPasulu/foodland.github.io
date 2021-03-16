<div class="container mt-2">
    <div class="container">
        <div class="row mt-4 mb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-dark">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                  </nav>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{session('message')}}
                </div>
                @endif
                @if (session()->has('pesan'))
                <div class="alert alert-success">
                    {{session('pesan')}}
                </div>
                @endif
            </div>
        </div>
    
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Gambar</td>
                                <td>Keterangan</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Total Harga</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    <img src="{{url('assets/food')}}/{{$pesanan_detail->product->gambar}}" alt="gambar-menu" class="img-fluid" width="150" height="150">
                                </td>
                                <td>
                                    {{$pesanan_detail->product->nama}}
                                </td>
                                <td>
                                    {{$pesanan_detail->jumlah_pesanan}}
                                </td>
                                <td>
                                    Rp. {{number_format($pesanan_detail->product->harga)}}
                                </td>
                                <td><strong>
                                    Rp. {{number_format($pesanan_detail->total_harga)}}
                                </strong></td>
                                <td>
                                    <i wire:click="destroy({{$pesanan_detail->id}})" class="fas fa-trash text-danger"></i>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            </tr>
                            @endforelse
                            @if (!empty($pesanan))
                            <tr>
                                <td colspan="6" align="right"><strong>Total Harga:</strong></td>
                                <td><strong> Rp.{{number_format($pesanan->total_harga)}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>PPN:</strong></td>
                                <td><strong> Rp.{{number_format($pesanan->kodeunik)}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>Total Pembayaran:</strong></td>
                                <td><strong> Rp.{{number_format($pesanan->total_harga+$pesanan->kodeunik)}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="2">
                                    <form wire:submit.prevent="checkout" >
                                        <button type="submit" class="btn btn-success btn-block"><a href=""></a>Checkout  <i class="fas fa-arrow-right"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>

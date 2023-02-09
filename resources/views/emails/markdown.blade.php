@component('mail::layout')
{{-- Header --}}

@slot('header')
@component('mail::header', ['url' => config('app.url')])
OLSHOP APP
@endcomponent
@endslot

# Verifikasi

##### **Dear Customer**,
Kode verifikasi anda {{$data}}, batas waktu pengguna kode ini 10 menit



{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} OLSHOP APP reserved
@endcomponent
@endslot
@endcomponent
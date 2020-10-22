@extends('layouts.front')

@section('content')
<div class="row">
    <div class="column col-md-12 mx-auto">
        <h1>～Column～</h1>
    </div>
</div>
<div class="row">
    <div class="pickup-contents-box animate col-lg-12">
        <div class="row">
            <ul class="pickup-contents">
                <li>
                    <a href="#">
                        <div class="pickup-image col-md-3">
                            <img src="storage/house.jpg" width="269" height="151">
                            <div class="pickup-title ef">不動産購入</div>
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="pickup-contents">
                <li>
                    <a href="#">
                        <div class="pickup-image col-md-3">
                            <img src="storage/money.jpg" width="269" height="151">
                            <div class="pickup-title ef">不動産購入</div>
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="pickup-contents">
                <li>
                    <a href="#">
                        <div class="pickup-image col-md-3">
                            <img src="storage/contract.jpg" width="269" height="151">
                            <div class="pickup-title ef">不動産購入</div>
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="pickup-contents">
                <li>
                    <a href="#">
                        <div class="pickup-image col-md-3">
                            <img src="storage/others.jpg" width="269" height="151">
                            <div class="pickup-title ef">不動産購入</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


@endsection
<div class="tab" role="tabpanel">
    @php if(request()->segment(count(request()->segments())) == 'ket-qua-vietlott'){  @endphp
        <ul class="nav-tabs day-selector with-div-100">
            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-mega-645' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-mega-645" title="XS Mega 6/45">Mega 6/45</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-max-4d' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-mega-645" title="XS Max 4D">Max 4D</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-power-655' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-mega-645" title="Power 6/55">Power 6/55</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-xo-so-max-3d' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-mega-645" title="XS Max 3D">Max 3D</a>
            </li>
        </ul>
    @php  } elseif (
        request()->segment(count(request()->segments())) == 'kqvietlott-mega-645' 
        || request()->segment(count(request()->segments())) == 'xs-mega-thu-4' 
        || request()->segment(count(request()->segments())) == 'xs-mega-thu-6' 
        || request()->segment(count(request()->segments())) == 'xs-mega-chu-nhat'){ @endphp
         <ul class="nav-tabs day-selector with-div-100">
            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-mega-645' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-mega-645" title="XS Mega Thứ 2">XS Mega</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-mega-thu-4' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-mega-thu-4" title="XS Mega Thứ 2">Thứ 4</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-mega-thu-6' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-mega-thu-6" title="XS Mega Thứ 3">Thứ 6</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-mega-chu-nhat' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-mega-chu-nhat" title="XS Mega Thứ 4">Chủ Nhật</a>
            </li>
        </ul>

    @php  } elseif (
        request()->segment(count(request()->segments())) == 'kqvietlott-mega-645'
        || request()->segment(count(request()->segments())) == 'kqvietlott-max-4d'
        || request()->segment(count(request()->segments())) == 'xs-max-4d-thu-3' 
        || request()->segment(count(request()->segments())) == 'xs-max-4d-thu-5' 
        || request()->segment(count(request()->segments())) == 'xs-max-4d-thu-7'){ @endphp
         <ul class="nav-tabs day-selector with-div-100">
            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-max-4d' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-power-655" title="XS Max 4D Thứ 2">XS Max 4D</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-max-4d-thu-3' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-max-4d-thu-3" title="XS Max 4D Thứ 2">Thứ 3</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-max-4d-thu-5' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-max-4d-thu-5" title="XS Max 4D Thứ 3">Thứ 5</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-max-4d-thu-7' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-max-4d-thu-7" title="XS Max 4D Thứ 4">Thứ 7</a>
            </li>
        </ul>

    @php  } elseif (
        request()->segment(count(request()->segments())) == 'kqvietlott-power-655'
        || request()->segment(count(request()->segments())) == 'kqvietlott-max-4d'
        || request()->segment(count(request()->segments())) == 'power-655-thu-3' 
        || request()->segment(count(request()->segments())) == 'power-655-thu-5' 
        || request()->segment(count(request()->segments())) == 'power-655-thu-7'){ @endphp
         <ul class="nav-tabs day-selector with-div-100">
            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-power-655' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-power-655" title="Xo So Power Thứ 3">Power 6/55</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'power-655-thu-3' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/power-655-thu-3" title="Xo So Power Thứ 3">Thứ 3</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'power-655-thu-5' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/power-655-thu-5" title="Xo So Power Thứ 2">Thứ 5</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'power-655-thu-7' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/power-655-thu-7" title="Xo So Power Thứ 3">Thứ 7</a>
            </li>
        </ul>

    @php  } elseif (
        request()->segment(count(request()->segments())) == 'kqvietlott-xo-so-max-3d'
        || request()->segment(count(request()->segments())) == 'xs-max-3d-thu-2' 
        || request()->segment(count(request()->segments())) == 'xs-max-3d-thu-4' 
        || request()->segment(count(request()->segments())) == 'xs-max-3d-thu-6'){ @endphp
         <ul class="nav-tabs day-selector with-div-100">

            <li class={{ request()->segment(count(request()->segments())) == 'kqvietlott-xo-so-max-3d' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/kqvietlott-power-655" title="XS Max 3D">XS Max 3D</a>
            </li>

            <li class={{ request()->segment(count(request()->segments())) == 'xs-max-3d-thu-2' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-max-3d-thu-2" title="XS Max Thứ 2">Thứ 2</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-max-3d-thu-4' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-max-3d-thu-4" title="XS Max Thứ 3">Thứ 4</a>
            </li>
            <li class={{ request()->segment(count(request()->segments())) == 'xs-max-3d-thu-6' ? 'active-tab-new' : '' }}>
                <a href="/ket-qua-vietlott/xs-max-3d-thu-6" title="XS Max Thứ 3">Thứ 6</a>
            </li>
        </ul>

    @php  } @endphp
</div>
        
@php
$record1  = "Chavalit";
$record2  = "";
$record3  = null;
@endphp

@isset($record1)
    $record1 is defined and is not null... <br>
@endisset

@empty($record2)
    $record2 is "empty" with empty string <br>
@endempty

@empty($record3)
    $record3 is "empty" with null <br>
@endempty
@php
    $i = 5;
@endphp
@switch($i)
    @case(1)
        //do First case...
    @break

    @case(2)
        //do Second case...
    @break

    @case('helloworld')
        //do String case...
    @break

    @default
        //do Default case...
@endswitch
@switch($order_status)
    @case(1)
        <span class="badge badge-pill badge-primary" title="รอเบิกสินค้า">Y</span>
    @break

    @case(2)
        <span class="badge badge-pill badge-warning" title="รอเปิด Invoice">W</span>
    @break

    @case(3)
        <span class="badge badge-pill badge-success" title="Invoice แล้ว">IV</span>
    @break
@endswitch


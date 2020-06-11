@foreach ($part as $item)
<tr tag={{ $item }}>
    <td>{{ $item->name }}</td>
    <td><img src="{{ asset('assets/images/parts/'.'/'.$item->image1) }}" alt="part Image" style="width:50px;"></td>
    <td>{{ str_limit($item->part_info, 20) }}</td>
    <td>{{ $item->brand->title }}</td>
    <td>{{ $item->model->name }}</td>
    <td>{{ $item->category->name }}</td>
    <td>{{ $item->qtystock }}</td>
    <td>{{ $item->price }}</td>
    <td>{{ $item->condition }}</td>
    <td>
    @if($item->sale)
      <span class="badge badge-danger">Sale</span>
    @endif
    @if($item->tested)
      <span class="badge badge-success">Tested</span>
    @endif
    </td>
    <td>
    <a tag={{ $item->id }} href="#!" class="edit-usrpart btn btn-icon btn-primary mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="feather icon-edit-2"></i></a>
    <a tag="{{ $item->id }}" href="#!" class="delete-user-part btn btn-icon btn-danger mr-1" data-toggle="tooltip" title="" data-original-title="Delete"><i class="feather icon-trash-2"></i></a>
    </td>
</tr>
@endforeach
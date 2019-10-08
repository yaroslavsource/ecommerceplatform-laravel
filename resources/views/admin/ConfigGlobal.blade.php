<div class="box">
  <div class="box-header with-border">
  <h3 class="box-title">
  {{ trans('language.config.title') }}
  </h3>
   <div style="float:right;">
    <a href="/{{ config('admin.route.prefix') }}/config_global/1/edit"><span title="Edit" class="btn btn-flat" ><i class="fa fa-edit" style="font-size:28px;"></i></span></a>
  </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tbody><tr>
        <th style="width: 30%">{{ trans('language.config.attribute_name') }}</th>
        <th>{{ trans('language.config.attribute_value') }}</th>
      </tr>

      <tr>
        <td>{{ trans('language.config.logo') }}</td>
        <td><img style="width: 100px;" src="{{ asset(config('filesystems.disks.path_file').'/'.$infos->logo) }}"></td>
      </tr>

      <tr>
        <td>{{ trans('language.config.watermark') }}</td>
        <td><img style="width: 50px;" src="{{ asset(config('filesystems.disks.path_file').'/'.$infos->watermark) }}"></td>
      </tr>

      <tr>
        <td>{{ trans('language.config.phone') }}</td>
        <td>{{ $infos->phone }}</td>
      </tr>
      <tr>
        <td>{{ trans('language.config.long_phone') }}</td>
        <td>{{ $infos->long_phone }}</td>
      </tr>

      <tr>
        <td>{{ trans('language.config.time_active') }}</td>
        <td>{{ $infos->time_active }}</td>
      </tr>

    <tr>
      <td>{{ trans('language.config.address') }}</td>
      <td>{{ $infos->address }}</td>
    </tr>

    <tr>
      <td>{{ trans('language.config.email') }}</td>
      <td>{{ $infos->email }}</td>
    </tr>

      <tr>
      <td>{{ trans('language.config.language') }}</td>
      <td>{{ $infos->locale }}</td>
    </tr>

    <tr>
    <td>{{ trans('language.config.timezone') }}</td>
    <td>{{ $infos->timezone }}</td>
  </tr>
  <tr>
    <td>{{ trans('language.config.currency') }}</td>
    <td>{{ $infos->currency }}</td>
  </tr>

@foreach ($infosDescription as $obj => $infoDescription)
  <tr>
    <td>{{ trans('language.config.'.$obj) }}</td>
    <td>
      @foreach ($infoDescription as $lang => $des)
        {{ $languages[$lang]['name'] }}:<br>
        <i>{{ $des }}</i><br>
      @endforeach
    </td>
  </tr>
@endforeach


    </tbody></table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <b>{{ trans('language.config.maintain_content') }}</b>:<br>
    {{ $infos->maintain_content }}
  </div>
</div>

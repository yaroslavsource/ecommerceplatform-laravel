<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>{{ trans('Modules/language.code') }}</th>
                  <th>{{ trans('Modules/language.name') }}</th>
                  <th>{{ trans('Modules/language.version') }}</th>
                  <th>{{ trans('Modules/language.auth') }}</th>
                  <th>{{ trans('Modules/language.link') }}</th>
                  <th>{{ trans('Modules/language.sort') }}</th>
                  <th>{{ trans('Modules/language.status') }}</th>
                  <th>{{ trans('Modules/language.action') }}</th>
                </tr>
                </thead>
                <tbody>
                  @if (!$modules)
                    <tr>
                      <td colspan="5" style="text-align: center;color: red;">Empty module!</td>
                    </tr>
                  @else
                  @foreach ($modules as $key => $module)
                  @php
                    $moduleClassName = $namespace.'\\'.$module;
                    $moduleClass = new $moduleClassName;
                    if(!array_key_exists($module, $modulesInstalled->toArray())){
                      $moduleStatus = null;
                      $moduleStatusTitle = trans('Modules/language.not_install');
                      $moduleAction = '<span onClick="installModule($(this),\''.$module.'\');" title="'.trans('Modules/language.install').'" type="button" class="btn btn-flat btn-success"><i class="fa fa-plus-circle"></i></span>';
                    }else{
                      if($modulesInstalled[$module]['value']){
                        $moduleStatus = 1;
                        $moduleStatusTitle = trans('Modules/language.actived');
                        $moduleAction ='<span onClick="disableModule($(this),\''.$module.'\');" title="'.trans('Modules/language.disable').'" type="button" class="btn btn-flat btn-warning btn-flat"><i class="fa fa-power-off"></i></span>&nbsp;
                              <span onClick="uninstallModule($(this),\''.$module.'\');" title="'.trans('Modules/language.remove').'" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>';
                      }else{
                        $moduleStatus = 0;
                        $moduleStatusTitle = trans('Modules/language.disabled');
                        $moduleAction = '<span onClick="enableModule($(this),\''.$module.'\');" title="'.trans('Modules/language.enable').'" type="button" class="btn btn-flat btn-primary"><i class="fa fa-paper-plane"></i></span>&nbsp;
                              <span onClick="uninstallModule($(this),\''.$module.'\');" title="'.trans('Modules/language.remove').'" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></span>';
                      }
                    }
                  @endphp
                    <tr>
                      <td>{{ $module }}</td>
                      <td>{{ $moduleClass->title }}</td>
                      <td>{{ $moduleClass->version??'' }}</td>
                      <td>{{ $moduleClass->auth??'' }}</td>
                      <td>{{ $moduleClass->link??'' }}</td>
                      <td>{{ isset($modulesInstalled[$module]['sort'])?$modulesInstalled[$module]['sort']:'' }}</td>
                      <td>{{ $moduleStatusTitle }}</td>
                      <td>{!! $moduleAction !!}</td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <div>
</div>
</section>
<script type="text/javascript">
  function enableModule(obj,key) {
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '{{ route('enableModule') }}',
        data: {
          "_token": "{{ csrf_token() }}",
          "key":key,
          "group":"{{ $group }}"
        },
        success: function (response) {
          console.log(response);
          if(parseInt(response.error) ==0){
              location.reload();
          }else{
              obj.button('reset');
              alert(response.msg);
          }
        }
      });

  }
  function disableModule(obj,key) {
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '{{ route('disableModule') }}',
        data: {
          "_token": "{{ csrf_token() }}",
          "key":key,
          "group":"{{ $group }}"
        },
        success: function (response) {
          console.log(response);
          if(parseInt(response.error) ==0){
              location.reload();
          }else{
              obj.button('reset');
              alert(response.msg);
          }
        }
      });
  }
  function installModule(obj,key) {
      obj.button('loading');
      $.ajax({
        type: 'POST',
        dataType:'json',
        url: '{{ route('installModule') }}',
        data: {
          "_token": "{{ csrf_token() }}",
          "key":key,
          "group":"{{ $group }}"
        },
        success: function (response) {
          console.log(response);
          if(parseInt(response.error) ==0){
              location.reload();
          }else{
              obj.button('reset');
              alert(response.msg);
          }
        }
      });
  }
  function uninstallModule(obj,key) {
    var checkstr =  confirm('are you sure you want to uninstall this?');
      if(checkstr == true){
            obj.button('loading');
            $.ajax({
              type: 'POST',
              dataType:'json',
              url: '{{ route('uninstallModule') }}',
              data: {
                "_token": "{{ csrf_token() }}",
                "key":key,
                "group":"{{ $group }}"
              },
              success: function (response) {
                console.log(response);
                if(parseInt(response.error) ==0){
                    location.reload();
                }else{
                    obj.button('reset');
                    alert(response.msg);
                }
              }
            });
      }else{
      return false;
      }
  }
</script>

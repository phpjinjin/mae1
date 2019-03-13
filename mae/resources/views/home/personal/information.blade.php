@extends('home.personal.index')

@section('order')
				<div class="m_right">
        	<div class="m_des">
            	<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                @foreach($userd as $k=>$v)
                  <tr valign="top">
                    <td width="115"><img @if($v->face != null) 
                      src="{{asset('/uploads/users/'.$v->face)}}"
                       @else 
                       src="/homes/images/user.jpg"
                       @endif width="90" height="90 />
                     </td>
                    <td>
                    	<div class="m_user">
						@if($user->uname == '')
                        	{{ $user->account }}
						@elseif($user->uname != '')
                        	{{ $user->uname }}
                        	@endif
                    	</div>
                        <p>
                           
                        </p>
                        <div class="m_notice">
                        	@if($user->uname == '')
                        	您有个人信息未完善,请单击下方修改按钮完善个人信息
                        	@elseif($user->uname != '')
                        	如果您需要修改个人信息,请点击下方按钮
                        	@endif
                        </div>
                    </td>
                  </tr>
                </table>	
            </div>
             
            <div class="mem_t">账号信息
               	<a onclick="edit({{session('id')}})" ><img src="/homes/images/tubiao.png" title="修改"></a> 
            </div>

            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
               
              <tr>
                <td width="40%">用户ID：<span style="color:#555555;">{{ $user->uid }}</span></td>               
              </tr>
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">
                @if( $v->phone == '')您还未设置电话
                	@else( $->phone != '') {{ $v->phone }}
                	@endif
                </span></td>
              </tr>
              <tr>
				<td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">
                	@if( $v->email == '')您还未设置邮箱
                	@else( $->email != '') {{ $v->email }}
                	@endif
                </span></td>
              </tr>
 
              @endforeach
            </table>
              
            
        </div>
        <script type="text/javascript">
			function edit(id){
				layer.open({
					type: 2,
					title: '修改信息',
					shadeClose: true,
					shade: 0.6,
					area: ['780px', '100%'],
				 	content: '/home/center/edit/'+id
				  }); 
			
		} 
		 	var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
		    parent.layer.close(index); //再执行关闭
		    if(index)
		    {
		      window.parent.location.reload();
		    }
        </script>
@endsection
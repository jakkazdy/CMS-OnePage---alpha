<div class="page-content">
<div class="page-header">
		<p class="alert alert-success" style="display:{$comunitty.status};">
			{$comunitty.addSucces}
		</p>
	</div>
<div class="page-header">
	<h1>
		{$page.list.title}
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<a href="{$url.seoPageAdd}">Dodaj zakładke</a>
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-xs-12">
				<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr>
							<th>{$page.list.tabNameMenu}</th>
							<th>{$page.list.tabTitle}</th>
							<th class="hidden-480">{$page.list.tabSettings}</th>
							<th class="hidden-480">{$page.list.tabStatus}</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$downListPage key=k item=v}
						<tr>
							<td>
								{$v.name_menu}
							</td>
							<td>{$v.title}</td>
							<td><span class="label label-sm label-warning">{$v.status}</span></td>

							<td>
								<div class="hidden-sm hidden-xs btn-group">

									<a href="{$url.seoPageEdit}{$v.id}"><button class="btn btn-xs btn-info">
										<i class="ace-icon fa fa-pencil bigger-120"></i>
									</button></a>

									<a href="{$url.seoPageDelete}{$v.id}"><button class="btn btn-xs btn-danger">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</button></a>
								</div>
							</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

											
<div class="page-content">
	<div class="page-header">
		<h1>
			{$page.add.title}
		</h1>
	</div><!-- /.page-header -->

	<div class="page-header">
		<p class="alert alert-success" style="display:{$comunitty.status};">
			{$comunitty.addSucces}
		</p>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" method="POST">
				<div class="form-group">

					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">{$page.add.formNameMenu}</label>

					<div class="col-sm-9">
					<input type="hidden" name="formid" value="{$formData.id}"/>
						<input type="text" name="name" id="form-field-1" placeholder="{$page.add.formNameMenuPlaceholder}" class="col-xs-10 col-sm-5" value="{$formData.name_menu}"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">{$page.add.formTitle}</label>

					<div class="col-sm-9">
						<input type="text" name="title" id="form-field-1" placeholder="{$page.add.formTitlePlaceholder}" class="col-xs-10 col-sm-5" value="{$formData.title}"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">{$page.add.formValue}</label>

					<div class="col-sm-9">
						<textarea class="form-control" name="date" placeholder="{$page.add.formValuePlaceholder}">{$formData.value}</textarea>
					</div>
				</div>

				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button class="btn btn-info" type="submit" name="submit">
							<i class="ace-icon fa fa-check bigger-110"></i>
							{$page.edit.formSubmit}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="{{$entity->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Suppression {{$title}}</h4>
			</div>
			<div class="modal-body">
				<p>Etes vous sur de vouloir supprimer <strong>{{$entity->label}}</strong> ?</p>
				<form method="delete" action="{{ route($formAction,['id' => $entity->id]) }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" class="btn btn-sm btn-default" value="Oui">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
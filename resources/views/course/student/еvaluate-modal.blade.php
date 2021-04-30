<div class="modal fade" id="evaluateModal" tabindex="-1" aria-labelledby="evaluateModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 20px">
			<div class="modal-header">
				Оцени домашно
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
			</div>
			<div class="modal-body">
				<form class="d-flex flex-column" method="POST" id="eval-form">
                    @csrf
					<div class="row mb-3">
						<div class="col-6">
	                        Свали домашно
						</div>
						<div class="col-6">
							Домашно
							<a id="downloadFile" download>
								<img src="{{ asset('assets/img/download.svg') }}">
							</a>
						</div>
					</div>
					<div class="mb-3 form-floating">
                        <textarea class="form-control" placeholder="Коментар" id="workExperience" name="comment" style="height: 100px" minlength="3" required></textarea>
                        <label for="workExperience">Коментар</label>
                    </div>
					<button class="btn align-self-end btn-navy-blue mt-2 col-4" id="evaluted-btn-submit">Оцени</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('.upload-btn').click(function() {
		var id = $(this).attr('data-lection-id');

		$('.homework-input').change(function() {
			var uploadHomework = '#upload-homework-' + id;
			$(uploadHomework).submit();
		});
	});

	$('.lection-eval').click(function() {
		var id = $(this).attr('data-lection-eval');

		$.ajax({
	        url: '/lection/random-homework/' + id,
	        type: 'get',
	        dataType: 'JSON',
	        success: function(data) {
                $('#downloadFile').attr("href", "{{asset('/data/homeworks/')}}" + data.file);

                $('#eval-form').attr("action", "{{ url('/lection/homework') }}/" + data.id + "/user/eval");
	        },
			error: function (error) {
			    $('#evaluted-btn-submit').attr("disabled", true);
			}
	    });
	});
});
</script>

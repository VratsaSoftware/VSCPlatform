<div class="modal fade" id="interestsModal-create" tabindex="-1" aria-labelledby="interestsModal-create" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Интереси
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Затвори"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column" action="{{ asset('/user/create/hobbies') }}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <textarea class="form-control" name="int_other" placeholder="Интереси" id="interests"
                        style="height: 100px"></textarea>
                        <label for="interests">Интереси</label>
                    </div>
                    <button class="btn align-self-end btn-navy-blue mt-2 col-4">Запази</button>
                </form>
            </div>
        </div>
    </div>
</div>

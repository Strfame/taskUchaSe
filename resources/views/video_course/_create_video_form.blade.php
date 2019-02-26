<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добави видео урок</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{action('VideoCourseController@store')}}" enctype="multipart/form-data" id="form">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Заглавие на урок</label>
                            <input type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                placeholder="Заглавие на урок.."
                                required>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Предмет</label>
                            <select id="inputState" class="form-control">
                                <option selected>Предмет..</option>
                                <option>...</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Име на файл</label>
                            <input type="text"
                                class="form-control"
                                id="file_name"
                                name="file_name"
                                placeholder="име на файл.."
                                required>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control"
                                id="description"
                                name="description" rows="3"
                                required>
                            </textarea>
                        </div>														

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отказ</button>
                        <button type="submit" class="btn btn-primary" id="savePicture">Запиши</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
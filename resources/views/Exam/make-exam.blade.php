<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="px-6 py-8">
                <form action="/add-exam" method="POST">
                    @csrf
                    <div id="addQuestion">
                        <h3>Question<sup><span class="text-blue-600">*</span></sup></h3>
                        <div class="row flex px-6">
                            <input class="form-control" name="question[]" id="question" type="text"
                                placeholder="Enter Question">
                            <div class="flex">
                                <label class=" col-form-label"><span class="text-lg"><b>A</b></span></label>
                                <input class="form-control m-1" name="option_A[]" id="question" type="text"
                                    placeholder="Enter Option">
                                <label class=" col-form-label"><span class="text-lg"><b>B</b></span></label>
                                <input class="form-control m-1" name="option_B[]" id="question" type="text"
                                    placeholder="Enter Option">
                            </div>
                            <div class="flex">
                                <label class=" col-form-label"><span class="text-lg"><b>C</b></span></label>
                                <input class="form-control m-1" name="option_C[]" id="question" type="text"
                                    placeholder="Enter Option">
                                <label class=" col-form-label"><span class="text-lg"><b>D</b></span></label>
                                <input class="form-control m-1" name="option_D[]" id="question" type="text"
                                    placeholder="Enter Option">
                            </div>
                            <div>
                                <h6>Answer : </h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A" checked>
                                    <label class="form-check-label" for="inlineRadio1">A</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A">
                                    <label class="form-check-label" for="inlineRadio1">B</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A">
                                    <label class="form-check-label" for="inlineRadio1">C</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A">
                                    <label class="form-check-label" for="inlineRadio1">D</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Save</button>
                    <button type="button" class="btn btn-primary mt-4 float-end" id="add">Add Question</button>
                </form>

            </div>



        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#add').click(function() {
                $('#addQuestion').prepend(`<h3>Question<sup><span class="text-blue-600">*</span></sup></h3>
                        <div class="row flex px-6">
                            <input class="form-control" name="question[]" id="question" type="text"
                                placeholder="Enter Question">
                            <div class="flex">
                                <label class=" col-form-label"><span class="text-lg"><b>A</b></span></label>
                                <input class="form-control m-1" name="option_A[]" id="question" type="text"
                                    placeholder="Enter Option">
                                <label class=" col-form-label"><span class="text-lg"><b>B</b></span></label>
                                <input class="form-control m-1" name="option_B[]" id="question" type="text"
                                    placeholder="Enter Option">
                            </div>
                            <div class="flex">
                                <label class=" col-form-label"><span class="text-lg"><b>C</b></span></label>
                                <input class="form-control m-1" name="option_C[]" id="question" type="text"
                                    placeholder="Enter Option">
                                <label class=" col-form-label"><span class="text-lg"><b>D</b></span></label>
                                <input class="form-control m-1" name="option_D[]" id="question" type="text"
                                    placeholder="Enter Option">
                            </div>
                            <div>
                                <h6>Answer : </h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A" checked>
                                    <label class="form-check-label" for="inlineRadio1">A</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A">
                                    <label class="form-check-label" for="inlineRadio1">B</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A">
                                    <label class="form-check-label" for="inlineRadio1">C</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="correct_option[]"
                                        id="inlineRadio1" value="A">
                                    <label class="form-check-label" for="inlineRadio1">D</label>
                                </div>
                            </div>
                        </div>`);
                //alert("hello");
                // let id = $(this).val();
                // $('select[name="course_id"]').empty();
                // console.log(id);
                // const xmlhttp = new XMLHttpRequest();
                // xmlhttp.onload = function() {
                //     var html_body = this.responseText;
                //     $('#course_id').html(html_body);
                //     console.log(html_body);
                // }
                // xmlhttp.open("GET", "/getcourse/" + id);
                // xmlhttp.send();

            });
        });
    </script>
</x-layout.bootstrap-layout>

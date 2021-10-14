<div class="card col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card-header">
        <span class="text-info">I. THÔNG TIN HÀNH CHÍNH</span>
    </div>
    <div class="card-body">
        <input  type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group row">
            <label for="hoten" class="col-4 col-form-label">Họ và tên <span class="text-danger">(*)</span></label>
            <div class="col-8">
                <input id="hoten" value="{{$benhnhan->hoten}}" name="hoten" placeholder="Họ và tên" type="text"
                       class="form-control"
                       required="required"
                       style="background-color:  #96d3ec!important;"
                >
            </div>
        </div>
        <div class="form-group row">
            <label for="namsinh" class="col-4 col-form-label">Năm sinh<span class="text-danger">(*)</span></label>
            <div class="col-8">
                <input  id="namsinh" value="{{$benhnhan->namsinh}}" name="namsinh" placeholder="Nhập số" type="text"
                        class="form-control"
                        required="required">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Giới tính</label>
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        @if($benhnhan->gioitinh == 1)
                            checked
                        @endif
                        name="gioitinh" id="gioitinh_0" type="radio" class="custom-control-input"
                           value="1">
                    <label for="gioitinh_0" class="custom-control-label">Nam</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input
                        @if($benhnhan->gioitinh == 0)
                        checked
                        @endif
                        name="gioitinh" id="gioitinh_1" type="radio" class="custom-control-input"
                           value="0">
                    <label for="gioitinh_1" class="custom-control-label">Nữ</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="diachi" class="col-4 col-form-label">Địa chỉ<span class="text-danger">(*)</span></label>
            <div class="col-8">
                        <textarea id="diachi" name="diachi" cols="40" rows="5" class="form-control"
                                  aria-describedby="diachiHelpBlock">{{$benhnhan->diachi}}</textarea>
                <span id="diachiHelpBlock" class="form-text text-muted">Nhập địa chỉ</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Số điện thoại<span class="text-danger">(*)</span></label>
            <div class="col-8">
                <input id="dienthoai" name="dienthoai" placeholder="Nhập số điện thoại" type="text"
                      value="{{$benhnhan->dienthoai}}" class="form-control">
            </div>
        </div>
    </div>
</div>
<div class=" card col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card-header">
        <span class="text-danger">II. KHAI BÁO Y TẾ</span>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="lichsu14" class="col-4 col-form-label">Trong vòng 14 ngày qua, anh chị có đến
                tỉnh/Thành
                Phố, quốc Gia/Vùng lãnh thổ (Có thể đi nhiều nơi khác)</label>
            <div class="col-8">
                            <textarea id="lichsu14" name="lichsu14" cols="40" rows="5"
                                      class="form-control">Không có</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Có XUẤT HIỆN ít nhất 1 trong các dấu hiệu sau: sốt,ho,khó thở,viêm
                phổi,đau
                họng,
                mệt mỏi không?</label>
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="trieuchung" id="trieuchung_0" type="radio" class="custom-control-input"
                           value="1">
                    <label for="trieuchung_0" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked name="trieuchung" id="trieuchung_1" type="radio"
                           class="custom-control-input"
                           value="0">
                    <label for="trieuchung_1" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4"> Có TIẾP XÚC với người bệnh hoặc nghi ngờ, mắc bệnh COVID-19</label>
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="tiepxuccovid" id="tiepxuccovid_0" type="radio"
                           class="custom-control-input"
                           value="1">
                    <label for="tiepxuccovid_0" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked name="tiepxuccovid" id="tiepxuccovid_1" type="radio"
                           class="custom-control-input"
                           value="0">
                    <label for="tiepxuccovid_1" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Có TIẾP XÚC với người có biểu hiện (Sốt, ho, khó thở, Viêm
                Phổi)</label>
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="tiepxuctc" id="tiepxuctc_0" type="radio" class="custom-control-input"
                           value="1">
                    <label for="tiepxuctc_0" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked name="tiepxuctc" id="tiepxuctc_1" type="radio"
                           class="custom-control-input"
                           value="0">
                    <label for="tiepxuctc_1" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
    </div>

</div>

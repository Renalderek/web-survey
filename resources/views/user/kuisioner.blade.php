@include('admin.head')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Isi Kuisioner</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.kuisioner.submit') }}">
                        @csrf
                        @foreach ($kuisioners as $kuisioner)
                            <div class="form-group">
                                <label>{{ $kuisioner->pertanyaan }}</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban[{{ $kuisioner->id }}]"
                                        id="baik_sekali_{{ $kuisioner->id }}" value="Baik Sekali" required>
                                    <label class="form-check-label" for="baik_sekali_{{ $kuisioner->id }}">
                                        Baik Sekali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban[{{ $kuisioner->id }}]"
                                        id="baik_{{ $kuisioner->id }}" value="Baik" required>
                                    <label class="form-check-label" for="baik_{{ $kuisioner->id }}">
                                        Baik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban[{{ $kuisioner->id }}]"
                                        id="netral_{{ $kuisioner->id }}" value="Netral" required>
                                    <label class="form-check-label" for="netral_{{ $kuisioner->id }}">
                                        Netral
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban[{{ $kuisioner->id }}]"
                                        id="kurang_{{ $kuisioner->id }}" value="Kurang" required>
                                    <label class="form-check-label" for="kurang_{{ $kuisioner->id }}">
                                        Kurang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban[{{ $kuisioner->id }}]"
                                        id="buruk_{{ $kuisioner->id }}" value="Buruk" required>
                                    <label class="form-check-label" for="buruk_{{ $kuisioner->id }}">
                                        Buruk
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer');

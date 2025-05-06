<form method="POST" action="{{ isset($healthRecord) ? route('owner.health_records.update', $healthRecord->id) : route('owner.health_records.store') }}">
    @csrf
    @if(isset($healthRecord))
        @method('PUT')
    @endif

    <div class="row">
        <!-- Camel Selection (Optional) -->
        <div class="form-group col-md-6">
            <label for="camel_id">اختر الجمل <strong class="text-danger">*</strong></label>
            <select id="camel_id"  required name="camel_id" class="form-control select2 @error('camel_id') is-invalid @enderror">
                <option value="">اختر الجمل</option>
                @foreach($camels as $camel)
                    <option value="{{ $camel->id }}" {{ old('camel_id', $healthRecord->camel_id ?? '') == $camel->id ? 'selected' : '' }}>
                        {{ $camel->name }} - {{ $camel->tag_number }}
                    </option>
                @endforeach
            </select>
            @error('camel_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Checkup Date -->
        <div class="form-group col-md-6">
            <label for="checkup_date">تاريخ الفحص <strong class="text-danger">*</strong></label>
            <input type="date" id="checkup_date" name="checkup_date" class="form-control @error('checkup_date') is-invalid @enderror"
                   value="{{ old('checkup_date', $healthRecord->checkup_date ?? '') }}" required>
            @error('checkup_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Weight -->
        <div class="form-group col-md-6">
            <label for="weight">الوزن (كجم) <strong class="text-danger">*</strong></label>
            <input type="number" id="weight" name="weight" class="form-control @error('weight') is-invalid @enderror"
                   value="{{ old('weight', $healthRecord->weight ?? '') }}" min="0" required>
            @error('weight') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Height -->
        <div class="form-group col-md-6">
            <label for="height">الارتفاع (سم) <strong class="text-danger">*</strong></label>
            <input type="number" id="height" name="height" class="form-control @error('height') is-invalid @enderror"
                   value="{{ old('height', $healthRecord->height ?? '') }}" min="0" required>
            @error('height') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Temperature -->
        <div class="form-group col-md-6">
            <label for="temperature">درجة الحرارة (°C) <strong class="text-danger">*</strong></label>
            <input type="number" step="0.1" id="temperature" name="temperature" class="form-control @error('temperature') is-invalid @enderror"
                   value="{{ old('temperature', $healthRecord->temperature ?? '') }}" min="30" max="45" required>
            <small class="form-text text-muted">درجة الحرارة الطبيعية للإبل تتراوح بين 37-39°C</small>
            @error('temperature') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Heart Rate -->
        <div class="form-group col-md-6">
            <label for="heart_rate">معدل نبض القلب (نبضة/دقيقة) <strong class="text-danger">*</strong></label>
            <input type="number" id="heart_rate" name="heart_rate" class="form-control @error('heart_rate') is-invalid @enderror"
                   value="{{ old('heart_rate', $healthRecord->heart_rate ?? '') }}" min="20" max="100" required>
            <small class="form-text text-muted">المعدل الطبيعي يتراوح بين 40-60 نبضة/دقيقة</small>
            @error('heart_rate') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Blood Test Results -->
        <div class="form-group col-md-6">
            <label for="blood_test_results">نتائج فحص الدم (اختياري)</label>
            <textarea id="blood_test_results" name="blood_test_results" class="form-control @error('blood_test_results') is-invalid @enderror">{{ old('blood_test_results', $healthRecord->blood_test_results ?? '') }}</textarea>
            @error('blood_test_results') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Allergies -->
        <div class="form-group col-md-6">
            <label for="allergies">الحساسية (اختياري)</label>
            <textarea id="allergies" name="allergies" class="form-control @error('allergies') is-invalid @enderror">{{ old('allergies', $healthRecord->allergies ?? '') }}</textarea>
            @error('allergies') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Medications Given -->
        <div class="form-group col-md-6">
            <label for="medications_given">الأدوية المقدمة (اختياري)</label>
            <textarea id="medications_given" name="medications_given" class="form-control @error('medications_given') is-invalid @enderror">{{ old('medications_given', $healthRecord->medications_given ?? '') }}</textarea>
            @error('medications_given') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Next Checkup Date -->
        <div class="form-group col-md-6">
            <label for="next_checkup_date">موعد الفحص القادم (اختياري)</label>
            <input type="date" id="next_checkup_date" name="next_checkup_date" class="form-control @error('next_checkup_date') is-invalid @enderror"
                   value="{{ old('next_checkup_date', $healthRecord->next_checkup_date ?? '') }}">
            @error('next_checkup_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Diagnosis -->
        <div class="form-group col-md-6">
            <label for="diagnosis">التشخيص <strong class="text-danger">*</strong></label>
            <textarea id="diagnosis" name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror" required>{{ old('diagnosis', $healthRecord->diagnosis ?? '') }}</textarea>
            @error('diagnosis') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Treatment -->
        <div class="form-group col-md-6">
            <label for="treatment">العلاج <strong class="text-danger">*</strong></label>
            <textarea id="treatment" name="treatment" class="form-control @error('treatment') is-invalid @enderror" required>{{ old('treatment', $healthRecord->treatment ?? '') }}</textarea>
            @error('treatment') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Veterinarian -->
        <div class="form-group col-md-6">
            <label for="veterinarian">الطبيب البيطري (اختياري)</label>
            <input type="text" id="veterinarian" name="veterinarian" class="form-control @error('veterinarian') is-invalid @enderror"
                   value="{{ old('veterinarian', $healthRecord->veterinarian ?? '') }}">
            @error('veterinarian') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">{{ isset($healthRecord) ? __('تحديث') : __('إضافة') }}</button>
</form>

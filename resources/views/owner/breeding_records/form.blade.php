<form method="POST" action="{{ isset($breedingRecord) ? route('owner.breeding_records.update', $breedingRecord->id) : route('owner.breeding_records.store') }}">
    @csrf
    @if(isset($breedingRecord))
        @method('PUT')
    @endif

    <div class="row">
        <div class="form-group col-md-6">
            <label for="camel_id">الجمل الرئيسي *</label>
            <select id="camel_id" name="camel_id" class="form-control select2 @error('camel_id') is-invalid @enderror" required>
                <option value="">اختر الجمل</option>
                @foreach($camels as $camel)
                    <option value="{{ $camel->id }}" {{ old('camel_id', $breedingRecord->camel_id ?? '') == $camel->id ? 'selected' : '' }}>
                        {{ $camel->name }} - {{ $camel->tag_number }}
                    </option>
                @endforeach
            </select>
            @error('camel_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="mate_id">الجمل الشريك *</label>
            <select id="mate_id" name="mate_id" class="form-control select2 @error('mate_id') is-invalid @enderror" required>
                <option value="">اختر الجمل الشريك</option>
                @foreach($camels as $camel)
                    <option value="{{ $camel->id }}" {{ old('mate_id', $breedingRecord->mate_id ?? '') == $camel->id ? 'selected' : '' }}>
                        {{ $camel->name }} - {{ $camel->tag_number }}
                    </option>
                @endforeach
            </select>
            @error('mate_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="date">تاريخ التزاوج *</label>
            <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror"
                   value="{{ old('date', $breedingRecord->date ?? '') }}" required>
            @error('date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="status">الحالة *</label>
            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="pregnant" {{ old('status', $breedingRecord->status ?? '') == 'pregnant' ? 'selected' : '' }}>حامل</option>
                <option value="not_pregnant" {{ old('status', $breedingRecord->status ?? '') == 'not_pregnant' ? 'selected' : '' }}>غير حامل</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">{{ isset($breedingRecord) ? __('تحديث') : __('إضافة') }}</button>
</form>

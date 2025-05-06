<form method="POST" action="{{ isset($camel) ? route('owner.camels.update', $camel->id) : route('owner.camels.store') }}">
    @csrf
    @if(isset($camel))
        @method('PUT')
    @endif

    <div class="row">
        <!-- Tag Number -->
        <div class="form-group col-md-6">
            <label for="tag_number">وصف الوسم  <strong class="text-danger">*</strong></label>
            <input type="text" id="tag_number" name="tag_number" class="form-control @error('tag_number') is-invalid @enderror"
                   value="{{ old('tag_number', $camel->tag_number ?? '') }}" required>
            @error('tag_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Name -->
        <div class="form-group col-md-6">
            <label for="name">اسم الجمل <strong class="text-danger">*</strong></label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $camel->name ?? '') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Breed -->
        <div class="form-group col-md-6">
            <label for="breed">السلالة <strong class="text-danger">*</strong></label>
            <input type="text" id="breed" name="breed" class="form-control @error('breed') is-invalid @enderror"
                   value="{{ old('breed', $camel->breed ?? '') }}" required>
            @error('breed') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- النوع -->
        <div class="form-group col-md-6">
            <label for="origin">النوع <strong class="text-danger">*</strong></label>
            <select id="origin" name="origin" class="form-control @error('origin') is-invalid @enderror" required>
                <option value="">اختر النوع</option>
                <option value="مجاهيم" {{ old('origin', $camel->origin ?? '') == 'مجاهيم' ? 'selected' : '' }}>مجاهيم</option>
                <option value="مغاتير" {{ old('origin', $camel->origin ?? '') == 'مغاتير' ? 'selected' : '' }}>مغاتير</option>
            </select>
            @error('origin') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- اللون -->
        <!-- اللون -->
        <div class="form-group col-md-6">
            <label for="color">اللون <strong class="text-danger">*</strong></label>
            <select id="color" name="color" class="form-control @error('color') is-invalid @enderror" required>
                <option value="">اختر اللون</option>
                <option value="أسود" {{ old('color', $camel->color ?? '') == 'أسود' ? 'selected' : '' }} data-origin="مجاهيم">أسود</option>
                <option value="وضح" {{ old('color', $camel->color ?? '') == 'وضح' ? 'selected' : '' }} data-origin="مغاتير">وضح</option>
                <option value="شقح" {{ old('color', $camel->color ?? '') == 'شقح' ? 'selected' : '' }} data-origin="مغاتير">شقح</option>
                <option value="صفر" {{ old('color', $camel->color ?? '') == 'صفر' ? 'selected' : '' }} data-origin="مغاتير">صفر</option>
                <option value="حمر" {{ old('color', $camel->color ?? '') == 'حمر' ? 'selected' : '' }} data-origin="مغاتير">حمر</option>
                <option value="شعل" {{ old('color', $camel->color ?? '') == 'شعل' ? 'selected' : '' }} data-origin="مغاتير">شعل</option>
            </select>
            @error('color') <div class="text-danger">{{ $message }}</div> @enderror
        </div>



        <!-- Weight -->
        <div class="form-group col-md-6">
            <label for="weight">الوزن (كجم) <strong class="text-danger">*</strong></label>
            <input type="number" id="weight" name="weight" class="form-control @error('weight') is-invalid @enderror"
                   value="{{ old('weight', $camel->weight ?? '') }}" min="0" required>
            @error('weight') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Height -->
        <div class="form-group col-md-6">
            <label for="height">الارتفاع (سم) <strong class="text-danger">*</strong></label>
            <input type="number" id="height" name="height" class="form-control @error('height') is-invalid @enderror"
                   value="{{ old('height', $camel->height ?? '') }}" min="0" required>
            @error('height') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Date of Birth -->
        <div class="form-group col-md-6">
            <label for="date_of_birth">تاريخ الميلاد <strong class="text-danger">*</strong></label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror"
                   value="{{ old('date_of_birth', $camel->date_of_birth ?? '') }}" required>
            @error('date_of_birth') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Gender -->
        <div class="form-group col-md-6">
            <label for="gender">الجنس <strong class="text-danger">*</strong></label>
            <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                <option value="">اختر الجنس</option>
                <option value="male" {{ old('gender', $camel->gender ?? '') == 'male' ? 'selected' : '' }}>ذكر</option>
                <option value="female" {{ old('gender', $camel->gender ?? '') == 'female' ? 'selected' : '' }}>أنثى</option>
            </select>
            @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
        </div>


        <!-- Health Status -->
        <div class="form-group col-md-6">
            <label for="health_status">الحالة الصحية <strong class="text-danger">*</strong></label>
            <select id="health_status" name="health_status" class="form-control @error('health_status') is-invalid @enderror" required>
                <option value="">اختر الحالة</option>
                <option value="جيدة" {{ old('health_status', $camel->health_status ?? '') == 'جيدة' ? 'selected' : '' }}>جيدة</option>
                <option value="غير جيدة" {{ old('health_status', $camel->health_status ?? '') == 'غير جيدة' ? 'selected' : '' }}>غير جيدة</option>
            </select>
            @error('health_status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- مشكلة صحية -->
        <div class="form-group col-md-6" id="health_issue_group" style="display: none;">
            <label for="health_issue">وصف المشكلة الصحية</label>
            <textarea id="health_issue" name="health_issue" class="form-control @error('health_issue') is-invalid @enderror">{{ old('health_issue', $camel->health_issue ?? '') }}</textarea>
            @error('health_issue') <div class="text-danger">{{ $message }}</div> @enderror
        </div>


        <!-- Location -->
        <div class="form-group col-md-6">
            <label for="location">الموقع <strong class="text-danger">*</strong></label>
            <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror"
                   value="{{ old('location', $camel->location ?? '') }}" required>
            @error('location') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">{{ isset($camel) ? __('تحديث') : __('إضافة') }}</button>
</form>
@push('js')
    <script>
        function filterColorsByOrigin() {
            const origin = document.getElementById('origin').value;
            const colorSelect = document.getElementById('color');
            const allOptions = colorSelect.querySelectorAll('option');

            allOptions.forEach(option => {
                if (option.value === "") {
                    option.style.display = 'block'; // Always show "اختر اللون"
                } else if (option.dataset.origin === origin) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                    if (option.selected) option.selected = false;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('origin').addEventListener('change', filterColorsByOrigin);
            filterColorsByOrigin(); // Run on page load in edit mode
        });


        function toggleHealthIssue() {
            const healthStatus = document.getElementById('health_status').value;
            const issueGroup = document.getElementById('health_issue_group');

            if (healthStatus === 'غير جيدة') {
                issueGroup.style.display = 'block';
            } else {
                issueGroup.style.display = 'none';
                document.getElementById('health_issue').value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('health_status').addEventListener('change', toggleHealthIssue);
            toggleHealthIssue(); // Run on page load (for edit mode)
        });
    </script>


@endpush

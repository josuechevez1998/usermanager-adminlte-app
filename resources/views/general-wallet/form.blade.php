<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="month" class="form-label">{{ __('Month') }}</label>
            <input type="text" name="month" class="form-control @error('month') is-invalid @enderror" value="{{ old('month', $generalWallet?->month) }}" id="month" placeholder="Month">
            {!! $errors->first('month', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="year" class="form-label">{{ __('Year') }}</label>
            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $generalWallet?->year) }}" id="year" placeholder="Year">
            {!! $errors->first('year', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="balance" class="form-label">{{ __('Balance') }}</label>
            <input type="text" name="balance" class="form-control @error('balance') is-invalid @enderror" value="{{ old('balance', $generalWallet?->balance) }}" id="balance" placeholder="Balance">
            {!! $errors->first('balance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('Userid') }}</label>
            <input type="text" name="userId" class="form-control @error('userId') is-invalid @enderror" value="{{ old('userId', $generalWallet?->userId) }}" id="user_id" placeholder="Userid">
            {!! $errors->first('userId', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --success-color: #4cc9f0;
      --light-color: #f8f9fa;
      --dark-color: #212529;
    }
    
    body {
      background-color: #f5f7fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }
    
    .card-header {
      background-color: var(--primary-color);
      color: white;
      border-radius: 16px 16px 0 0 !important;
      padding: 1.5rem;
    }
    
    .form-control, .form-select {
      border-radius: 8px;
      padding: 0.75rem 1rem;
      border: 1px solid #dee2e6;
      font-size: 1rem;
    }
    
    .form-control:focus, .form-select:focus {
      box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
      border-color: var(--primary-color);
    }
    
    .form-label {
      font-weight: 500;
      margin-bottom: 0.5rem;
      color: #495057;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      border-radius: 8px;
      padding: 0.75rem 2rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
    }
    
    .form-floating label {
      color: #6c757d;
    }
    
    .form-floating>.form-control:focus~label,
    .form-floating>.form-control:not(:placeholder-shown)~label {
      color: var(--primary-color);
      opacity: 0.8;
    }
    
    .image-preview {
      width: 100%;
      height: 180px;
      border-radius: 8px;
      border: 2px dashed #dee2e6;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
      overflow: hidden;
      background-color: #f8f9fa;
      transition: all 0.3s ease;
    }
    
    .image-preview:hover {
      border-color: var(--primary-color);
    }
    
    .image-preview i {
      font-size: 3rem;
      color: #adb5bd;
    }
    
    .image-preview img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }
    
    .invalid-feedback {
      font-size: 0.85rem;
      margin-top: 0.5rem;
    }
    
    .form-floating {
      margin-bottom: 1.5rem;
    }
    
    .btn-outline-secondary {
      color: #6c757d;
      border-color: #ced4da;
    }
    
    .btn-outline-secondary:hover {
      background-color: #f8f9fa;
      color: #495057;
    }
    
    .price-input-group {
      position: relative;
    }
    
    .price-input-group .form-control {
      padding-left: 2rem;
    }
    
    .currency-symbol {
      position: absolute;
      left: 1rem;
      top: 0.75rem;
      color: #6c757d;
      z-index: 4;
    }
    
    .char-count {
      font-size: 0.8rem;
      color: #6c757d;
      text-align: right;
      margin-top: 0.25rem;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <i class="fas fa-box-open me-3 fa-2x"></i>
            <h2 class="mb-0">{{ isset($product) ? 'Update Product' : 'Add New Product' }}</h2>
          </div>
          <div class="card-body p-4">
            <form action="{{ route('products_save', isset($product) ? $product->id : null) }}" method="post" class="needs-validation" novalidate id="productForm">
              @csrf
              
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="code" placeholder="Enter product code" name="code" required value="{{ $product->code ?? '' }}">
                    <label for="code"><i class="fas fa-barcode me-2"></i>Product Code</label>
                    <div class="invalid-feedback">
                      <i class="fas fa-exclamation-circle me-2"></i>Please provide a valid product code
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="model" placeholder="Enter model" name="model" required value="{{ $product->model ?? '' }}">
                    <label for="model"><i class="fas fa-tag me-2"></i>Model</label>
                    <div class="invalid-feedback">
                      <i class="fas fa-exclamation-circle me-2"></i>Please provide a valid model number
                    </div>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="name" placeholder="Enter product name" name="name" required value="{{ $product->name ?? '' }}">
                    <label for="name"><i class="fas fa-signature me-2"></i>Product Name</label>
                    <div class="invalid-feedback">
                      <i class="fas fa-exclamation-circle me-2"></i>Please provide a product name
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <label for="price" class="form-label"><i class="fas fa-dollar-sign me-2"></i>Price</label>
                  <div class="price-input-group">
                    <span class="currency-symbol">$</span>
                    <input type="number" step="0.01" class="form-control" id="price" placeholder="0.00" name="price" required value="{{ $product->price ?? '' }}">
                    <div class="invalid-feedback">
                      <i class="fas fa-exclamation-circle me-2"></i>Please provide a valid price
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <label for="photo" class="form-label"><i class="fas fa-image me-2"></i>Photo URL</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="photo" placeholder="Enter image URL" name="photo" required value="{{ $product->photo ?? '' }}">
                    <button class="btn btn-outline-secondary" type="button" id="previewBtn">Preview</button>
                    <div class="invalid-feedback">
                      <i class="fas fa-exclamation-circle me-2"></i>Please provide a photo URL
                    </div>
                  </div>
                  
                  <div class="image-preview" id="imagePreview">
                    @if(isset($product) && $product->photo)
                      <img src="{{ $product->photo }}" alt="Product Image">
                    @else
                      <i class="fas fa-camera"></i>
                    @endif
                  </div>
                </div>
                
                <div class="col-12">
                  <label for="description" class="form-label"><i class="fas fa-align-left me-2"></i>Product Description</label>
                  <textarea class="form-control" id="description" placeholder="Enter detailed product description" rows="4" name="description" required>{{ $product->description ?? '' }}</textarea>
                  <div class="char-count"><span id="charCount">0</span>/500 characters</div>
                  <div class="invalid-feedback">
                    <i class="fas fa-exclamation-circle me-2"></i>Please provide a product description
                  </div>
                </div>
                
                <div class="col-12 d-flex justify-content-between mt-4">
                  <a href="{{ route('products_list') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Cancel
                  </a>
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>{{ isset($product) ? 'Update Product' : 'Save Product' }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Form validation
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
      
      // Image preview
      const photoInput = document.getElementById('photo');
      const imagePreview = document.getElementById('imagePreview');
      const previewBtn = document.getElementById('previewBtn');
      
      previewBtn.addEventListener('click', function() {
        if (photoInput.value) {
          imagePreview.innerHTML = `<img src="${photoInput.value}" alt="Product Image" onerror="this.onerror=null;this.innerHTML='<i class=\'fas fa-times-circle fa-3x text-danger\'></i><p class=\'text-danger mt-2\'>Invalid Image URL</p>'">`;
        }
      });
      
      // Character counter for description
      const descriptionField = document.getElementById('description');
      const charCount = document.getElementById('charCount');
      
      descriptionField.addEventListener('input', function() {
        charCount.textContent = this.value.length;
        if (this.value.length > 500) {
          charCount.classList.add('text-danger');
        } else {
          charCount.classList.remove('text-danger');
        }
      });
      
      // Trigger initial character count
      if (descriptionField.value) {
        charCount.textContent = descriptionField.value.length;
      }
    });
  </script>
</body>
</html>
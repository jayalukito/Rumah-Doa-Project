<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horizontal Sliding Cards</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .scrolling-wrapper {
      display: flex;
      overflow-x: auto; /* Enable horizontal scrolling */
      white-space: nowrap; /* Prevent line breaks for children */
      gap: 1rem;
      padding-bottom: 1rem;
      scroll-behavior: smooth;
      -ms-overflow-style: none; /* IE and Edge */
      scrollbar-width: none; /* Firefox */
    }
    .scrolling-wrapper::-webkit-scrollbar {
      display: none; /* Chrome, Safari, and Edge */
    }
    .card {
      flex: 0 0 auto; /* Prevent shrinking */
      width: 18rem; /* Fixed card width */
    }
  </style>
</head>
<body>
  <div class="container my-4">
    <h2>Horizontal Sliding Cards</h2>
    <div class="scrolling-wrapper border">
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">Card 1</h5>
          <p class="card-text">This is the first card.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">Card 2</h5>
          <p class="card-text">This is the second card.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">Card 3</h5>
          <p class="card-text">This is the third card.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">Card 4</h5>
          <p class="card-text">This is the fourth card.</p>
        </div>
      </div>
      <div class="card">
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title">Card 5</h5>
          <p class="card-text">This is the fifth card.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Комментарии</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootstrap5.ru/css/docs.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container">

  <header>
      <div class="heroe">
          <h1>Комментарии</h1>
      </div>
  </header>

<!-- CONTENT -->

  <section>
      <?php if (!empty($comments) && is_array($comments)) : ?>
        <table id="myTable" class="display" style="width:100%" data-page-length='3'>
          <thead>
              <tr>
                  <th>Дата</th>
                  <th>Автор</th>
                  <th>Текст комментария</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach ($comments as $item): ?>
              <tr>
                  <td><?= $item['date'] ?></td>
                  <td><?= $item['name'] ?></td>
                  <td><?= $item['text'] ?></td>
              </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <?php else : ?> <p>Комментариев нет</p>
      <?php endif ?>

      <div class="row mt-4">
        <div class="col-md-6">
          <h2>Добавить комментарий</h2>
          <form id="addComment">
            <div class="form-group">
              <label for="FormControlInput1">Email</label>
              <input type="text" class="form-control" name="email" id="FormControlInput1" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
              <label for="FormControlTextarea1">Текст</label>
              <textarea class="form-control" name="text" id="FormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="form-group mt-2">
              <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
          </form>
          <div class="alert message alert-primary mt-2 d-none" role="alert"></div>

        </div>
      </div>

  </section>
</div>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="/js/script.js?v=11"></script>
<script>let table = new DataTable('#myTable');</script>
<!-- -->

</body>
</html>

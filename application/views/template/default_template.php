<!DOCTYPE html>
<html lang="en">
<?= $page["meta"]; ?>
<?= $page["head"]; ?>
<body class="">
	<div class="wrapper ">
		<?= $page["sidebar"]; ?>
		<div class="main-panel">
			<?= $page["navigation"]; ?>
			<!-- BEGIN: Content-->
			<div class="content">
				<div class="content">
					<div class="container-fluid">
						<?= $content; ?>
					</div>
				</div>
			</div>
			<!-- END CONTENT -->
			<?= $page["footer"]; ?>
		</div>
	</div>
</body>
<?= $page["js"]; ?>
</html>
<?php
if (!defined('ABSPATH'))
	exit;

if (! function_exists('convert_image_to_webp')) :
	function convert_image_to_webp($filename)
	{
		// 拡張子を小文字に変換
		$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

		// pngまたはjpg/jpegの場合
		if ($extension === 'png' || $extension === 'jpg' || $extension === 'jpeg') {
			// 拡張子の位置を探す
			$position = strrpos($filename, '.' . $extension);

			// 拡張子が見つかった場合
			if ($position !== false) {
				// 拡張子をwebpに置換
				return substr_replace($filename, '.webp', $position);
			}
		}

		// 該当しない場合、元のファイル名をそのまま返す
		return $filename;
	}
endif;

if (! function_exists('get_hash_image_uri')) :

	function get_hash_image_uri($imgDir)
	{
		if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {
			return get_template_directory_uri() . '/' . $imgDir;
		} else {
			$manifestPath = DIST_PATH . '/manifest.json';
			$newImgDir = convert_image_to_webp($imgDir);


			if (!file_exists($manifestPath)) {
				// ファイルが存在しない場合のエラー処理
				return 'エラー: マニフェストファイルが見つかりません。';
			}

			$manifestContents = file_get_contents($manifestPath);

			if ($manifestContents === false) {
				// ファイルの読み込みに失敗した場合のエラー処理
				return 'エラー: マニフェストファイルを読み込めませんでした。';
			}

			$manifest = json_decode($manifestContents, true);

			if (!is_array($manifest) || !isset($manifest[$newImgDir])) {
				// マニフェストが適切な配列ではない、または指定されたキーが存在しない場合のエラー処理
				return 'エラー: 不正なマニフェストファイル、またはキーが存在しません。';
			}


			return DIST_URI . '/' . $manifest[$newImgDir]['file'];
		}
	}
endif;

if (! function_exists('is_parent_slug')) :
	function is_parent_slug()
	{
		global $post;
		if ($post->post_parent) {
			$post_data = get_post($post->post_parent);
			return $post_data->post_name;
		}
	}
endif;

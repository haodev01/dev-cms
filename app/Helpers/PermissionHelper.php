<?php

namespace App\Helpers;



class PermissionHelper
{
  const SUPER_ADMIN = 'admin_system';


  // TAG
  const VIEW_TAG = 'view_tag';
  const CREATE_TAG = 'create_tag';
  const EDIT_TAG = 'edit_tag';
  const DELETE_TAG = 'delete_tag';

  // ARTICLE
  const VIEW_ARTICLE = 'view_article';
  const CREATE_ARTICLE = 'create_article';
  const EDIT_ARTICLE = 'edit_article';
  const DELETE_ARTICLE = 'delete_article';

  // CATEGORY
  const VIEW_CATEGORY = 'view_category';
  const CREATE_CATEGORY = 'create_category';
  const EDIT_CATEGORY = 'edit_category';
  const DELETE_CATEGORY = 'delete_category';


  // USER
  const VIEW_USER = 'view_user';
  const CREATE_USER = 'create_user';
  const EDIT_USER = 'edit_user';
  const DELETE_USER = 'delete_user';

  // PERMISSION
  const VIEW_PERMISSION = 'view_permission';
  const CREATE_PERMISSION = 'create_permission';
  const EDIT_PERMISSION = 'edit_permission';
  const DELETE_PERMISSION = 'delete_permission';

  // ROLE
  const VIEW_ROLE = 'view_role';
  const CREATE_ROLE = 'create_role';
  const EDIT_ROLE = 'edit_role';
  const DELETE_ROLE = 'delete_role';
}

<?php

namespace threewp_broadcast\broadcasting_data;

/**
	@brief		Convenience methods for handling copied attachments.
	@details	Created mainly as a convenience class for get and has lookups.
	@since		2015-07-01 21:22:34
**/
class Copied_Attachments
	extends \threewp_broadcast\collection
{
	/**
		@brief		The broadcasting data object.
		@since		2015-06-06 09:02:08
	**/
	public $broadcasting_data;

	/**
		@brief		Constructor.
		@since		2015-07-01 21:23:44
	**/
	public function __construct( $broadcasting_data )
	{
		$this->broadcasting_data = $broadcasting_data;
		$this->items = & $this->broadcasting_data->copied_attachments;
	}

	/**
		@brief		Add a copied attachment.
		@since		2015-08-02 10:35:45
	**/
	public function add( $old_attachment, $new_attachment )
	{
		$pair = (object)[];
		$pair->new = $new_attachment;
		$pair->new->id = $pair->new->ID;		// Lowercase is expected.
		$pair->old = $old_attachment;
		$this->set( $old_attachment->ID, $pair );
		return $this;
	}

	/**
		@brief		Return the equivalent new attachment ID of this old attachment ID.
		@since		2015-07-01 21:39:43
	**/
	public function get( $old_attachment_id, $default = null )
	{
		if ( ! $this->has( $old_attachment_id ) )
			return false;
		return $this->get_attachment( $old_attachment_id )->ID;
	}

	/**
		@brief		Retrieve the complete attachment.
		@since		2015-07-29 16:42:44
	**/
	public function get_attachment( $old_attachment_id )
	{
		if ( ! $this->has( $old_attachment_id ) )
			return false;
		return $this->items[ $old_attachment_id ]->new;
	}
}

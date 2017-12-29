package io.openems.common.session;

import com.google.gson.JsonObject;
/**
 *
 * @author FENECON GmbH
 *
 */
public abstract class SessionData {
	public abstract JsonObject toJsonObject();
}

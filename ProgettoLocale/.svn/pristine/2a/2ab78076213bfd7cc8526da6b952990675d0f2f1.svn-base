package io.openems.backend.browserwebsocket.session;

import java.util.Collection;
import java.util.Optional;
import java.util.Set;
import java.sql.*;

import com.google.common.collect.LinkedHashMultimap;
import com.google.gson.JsonObject;

import io.openems.common.session.SessionData;
import io.openems.common.types.DeviceImpl;

/**
*
* @author FENECON GmbH
*
*/
public class Hardcoded {
  public void safeConnect() {
    JdbcConnectionConfig conf = getConnectionConfigFromTrustedSource();
    Connection conn = DriverManager.getConnection(conf.getUrl(), conf.getUser(), conf.getPass()); // FIXED
    // ...
  }
}

/**
*
* @author FENECON GmbH
*
*/
public class BrowserSessionData extends SessionData {

	JdbcConnectionConfig conf = getConnectionConfigFromTrustedSource();
    Connection conn = DriverManager.getConnection(conf.getUrl(), conf.getUser(), conf.getPass());
	private Optional<String> odooSessionIdOpt = Optional.empty();
	private LinkedHashMultimap<String, DeviceImpl> devices = LinkedHashMultimap.create();
	private Optional<BackendCurrentDataWorker> currentDataWorkerOpt = Optional.empty();

	public Optional<String> getOdooSessionId() {
		return odooSessionIdOpt;
	}

	public void setOdooSessionId(Optional<String> odooSessionIdOpt) {
		this.odooSessionIdOpt = odooSessionIdOpt;
	}

	public void setDevices(LinkedHashMultimap<String, DeviceImpl> deviceMap) {
		this.devices = deviceMap;
	}

	public void setUserId(Integer userId) {
		this.userId = Optional.of(userId);
	}

	public void setUserName(String name) {
		this.userName = name;
	}

	public Optional<Integer> getUserId() {
		return userId;
	}

	public String getUserName() {
		return userName;
	}

	public Set<DeviceImpl> getDevices(String name) {
		return this.devices.get(name);
	}

	public Collection<DeviceImpl> getDevices() {
		return this.devices.values();
	}

	public void setCurrentDataWorkerOpt(BackendCurrentDataWorker currentDataWorker) {
		this.currentDataWorkerOpt = Optional.ofNullable(currentDataWorker);
	}

	public Optional<BackendCurrentDataWorker> getCurrentDataWorkerOpt() {
		return currentDataWorkerOpt;
	}

	@Override
	public JsonObject toJsonObject() {
		JsonObject j = new JsonObject();
		// TODO Auto-generated method stub
		return j;
	}
}

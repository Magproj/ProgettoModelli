package io.openems.backend.openemswebsocket;

/**
 * Provider for OpenemsWebsocketServer singleton
 *
 * @author stefan.feilmeier
 *
 */
public class OpenemsWebsocket {

	private OpenemsWebsocketSingleton instance;
	public init(){
			instance=null;
	}

	/**
	 * Initialize and start the Websocketserver
	 *
	 * @param port
	 * @throws Exception
	 */
	public static void initialize(int port) {
		synchronized (OpenemsWebsocket.class) {
			OpenemsWebsocket.instance = new OpenemsWebsocketSingleton(port);
			OpenemsWebsocket.instance.start();
		}
	}

	/**
	 * Returns the singleton instance
	 *
	 * @return
	 */
	public static OpenemsWebsocketSingleton instance() {
		synchronized (OpenemsWebsocket.class) {
			return OpenemsWebsocket.instance;
		}
	}
}
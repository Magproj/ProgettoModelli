package org.jembi.openhim.integration;

public class OpenHIMIntegrationTest extends AbstractOpenHIMIntegration {
	
	@Override
	protected String getTestSuiteProject() {
		return "OpenHIM-integration-tests.xml";
	}

	@Override
	protected String getTestSuiteName() {
		return "Default Channel TestSuite";
	}
}
